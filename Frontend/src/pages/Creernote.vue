<style scoped>
.bordered {
  border-inline: 1px solid rgb(241, 241, 241);
}
</style>

<template>
  <div class="container h-screen bg-creme p-10">
    <div class="h-14 text-center">
      <button
        type="button"
        class="absolute top-9 left-10 py-2 text-sm font-medium text-gray bg-transparent"
        @click.prevent="router.push({ name: 'Notes' })"
      >
        <img src="/src/assets/icons/chevron-left.png" class="h-5" />
      </button>
      <h2 class="inline text-2xl text-black">Creer note</h2>
    </div>
    <div class="h-4/5">
      <form class="space-y-6" action="#" method="POST">
        <div>
          <label for="name" class="block text-sm text-medium-gray">Titre</label>
          <div class="mt-2">
            <input
              v-model.trim="dataForm.title"
              id="title"
              name="title"
              type="text"
              placeholder="Ma premiere tâche"
              required=""
              class="block w-full outline-none rounded-lg border-0 p-3 text-medium-gray placeholder:text-light-gray text-sm"
            />
          </div>
        </div>

        <div>
          <label for="email" class="block text-sm text-medium-gray"
            >Contenu</label
          >
          <div class="mt-2">
            <textarea
              v-model.trim="dataForm.content"
              id="content"
              name="content"
              type="text"
              placeholder="Aujourd'hui j'ai fait ma première session de self care"
              required=""
              class="block textarea min-h-64 w-full outline-none rounded-md border-0 p-3 text-medium-gray placeholder:text-light-gray text-sm"
            ></textarea>
          </div>
        </div>

        <p v-if="textError" class="mt-2 text-sm text-medium-red">
          {{ textError }}
        </p>

        <div>
          <button
            type="submit"
            class="flex w-full justify-center rounded-lg bg-midnight p-3 text-md text-white"
            :disabled="isLoading"
            @click.prevent="onSubmit()"
          >
            {{ isLoading ? "Loading ..." : "Suivant" }}
          </button>
        </div>
      </form>

      <div
        class="absolute bottom-3 mt-4 py-3 px-6 h-14 bg-white rounded-full justify-items-center"
      >
        <div class="inline-flex rounded-full igems-center" role="group">
          <button
            type="button"
            class="px-7 py-2 text-sm font-medium text-gray bg-white"
            @click.prevent="router.push({ name: 'Dashboard' })"
          >
            <img src="/src/assets/icons/house.png" class="h-5 w-6" />
          </button>
          <button
            type="button"
            class="px-7 py-2 text-sm font-medium text-gray bg-white bordered"
            @click.prevent="router.push({ name: 'Selfcare' })"
          >
            <img src="/src/assets/icons/love.png" class="h-5 w-6" />
          </button>
          <button
            type="button"
            class="px-7 py-2 text-sm font-medium text-gray bg-white"
            @click.prevent="router.push({ name: 'Notes' })"
          >
            <img src="/src/assets/icons/pencil.png" class="h-5 w-6" />
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { inject, ref } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";

export default {
  setup() {
    const router = useRouter();

    // Inject
    const sessionValue = inject("session");
    const { session } = sessionValue.get();

    const isLoading = ref(false);
    const dataForm = ref({
      title: "",
      content: "",
    });
    const textError = ref("");

    // * Send the note info to API *
    const onSubmit = async () => {
      const { title, content } = dataForm.value;

      if (!content || !title) {
        return (textError.value = "All fields are required to create a note");
      }

      isLoading.value = true;
      const jwt = localStorage.getItem("jwt");

      const bodyRequest = {
        user_id: session.value.id,
        note_content: content,
        note_title: title,
      };

      try {
        await axios.post(
          `${import.meta.env.VITE_API_URL}/auth/notes`,
          bodyRequest,
          {
            headers: { Authorization: `Bearer ${jwt}` },
          }
        );
        isLoading.value = false;
        textError.value = "";
        router.push({ name: "Notes" });
      } catch (error) {
        textError.value =
          "An error has occurred while registering note, try again later.";
        console.error(error);
        isLoading.value = false;
      }
    };

    return {
      // Data
      session,
      dataForm,
      isLoading,
      textError,
      // Functions
      onSubmit,
      // Utils
      router,
    };
  },
};
</script>
