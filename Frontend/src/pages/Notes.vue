<style scoped>
.bordered {
  border-inline: 1px solid rgb(241, 241, 241);
}

.notes-container {
  height: 70%;
}
</style>

<template>
  <div class="container static h-screen bg-white">
    <!--Register Note Button-->
    <button
      type="button"
      class="absolute top-4 right-4 p-2 text-sm font-medium text-gray bg-sunset rounded-full"
      @click.prevent="router.push({ name: 'Note' })"
    >
      <img src="/src/assets/icons/plus.png" class="h-8" />
      <!-- solid style -->
    </button>

    <div class="h-1/5">
      <img src="/src/assets/img/signin.jpg" class="h-full" />
    </div>

    <!--Content Area-->
    <div class="bg-creme rounded-t-lg h-4/5 w-screen pt-10 px-10 pb-0">
      <h2 class="text-2xl text-black">Mes notes</h2>
      <div
        v-if="notes && notes.length"
        class="my-5 bg-creme notes-container overflow-scroll scrolling-touch hide-scroll-bar items-start"
      >
        <Note
          v-for="note in notes"
          :key="note.id"
          :text="note.note_title"
          :content="note.note_content"
          class="bg-mint h-20 w-full mb-5 py-3 px-5 rounded-md"
        />
      </div>
      <div v-else-if="isLoading && (!notes || !notes.length)" class="mx-auto mt-32">
        <p class="text-medium-gray mx-10 text-center mt-4">
          Loading...
        </p>
      </div>
      <div v-else>
        <div class="mt-32 h-32">
          <img src="/src/assets/icons/philosophy.png" class="h-full mx-auto" />
          <p class="text-medium-gray mx-10 text-center mt-4">
            Oh, on dirait que tu n'as pas de notes, fais une pause
          </p>
        </div>
      </div>

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
          >
            <img src="/src/assets/icons/pencil.png" class="h-5 w-6" />
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { inject, defineAsyncComponent, onMounted, ref } from "vue";
import { useRouter } from 'vue-router';
import axios from 'axios';

export default {
  components: {
    Note: defineAsyncComponent(() => import('/src/components/Note.vue')),
  },
  setup() {
    const router = useRouter();

    // Inject
    const sessionValue = inject('session');
    const { session } = sessionValue.get()

    // Data
    const isLoading = ref(false);
    const notes = ref([])

    onMounted(() => getNotes());

    const getNotes = async () => {
      isLoading.value = true;
      const jwt = localStorage.getItem('jwt');

      try {
        const { data } = await axios.get(`${import.meta.env.VITE_API_URL}/auth/notes`,
          {
            headers: { Authorization: `Bearer ${jwt}` }
          }
        );
        if (!data || !data.data || !data.data.length) return console.log("Looks that you dont have notes, add one.")

        notes.value = data.data;
        isLoading.value = false;
      } catch (error) {
        console.error("An error has occurred querying notes, try again later.");
        console.error(error);
        isLoading.value = false;
      }
    }

    return {
      // Data
      session,
      notes,
      isLoading,
      // Utils
      router,
    }
  }
}
</script>