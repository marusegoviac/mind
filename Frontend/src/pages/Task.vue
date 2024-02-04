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
        @click.prevent="router.push({ name: 'Selfcare' })"
      >
        <img src="/src/assets/icons/chevron-left.png" class="h-5" />
      </button>
      <h2 class="inline text-2xl text-black">{{ task.task_title }}</h2>
    </div>
    <div class="h-4/5">
      <div class="my-4">
        <p class="text-md text-gray">
          Objectif
        </p>
				<p class="text-sm text-medium-gray my-5">
					{{ task.task_objectif }}
				</p>
      </div>

			<div class="my-4">
        <p class="text-md text-gray">
          Instructions
        </p>
				<p class="text-sm text-medium-gray my-5">
					{{ task.task_instructions }}
				</p>
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
import { inject, onMounted, ref } from "vue";
import { useRouter, useRoute } from 'vue-router';
import axios from 'axios';
// TODO: use isLoading on the HTML.

export default {
  setup() {
    const router = useRouter();
    const route = useRoute();

    // Inject
    const sessionValue = inject('session');
    const { session } = sessionValue.get()

    // Data
    const isLoading = ref(false);
    const task = ref({
      task_title: "",
      task_objectif: "",
      task_instructions: "",
    })

    onMounted(() => getTask(route.params.id));

    const getTask = async (id) => {
      isLoading.value = true;
      const jwt = localStorage.getItem('jwt');

      try {
        const { data } = await axios.get(`${import.meta.env.VITE_API_URL}/auth/tasks/${id}`,
          {
            headers: { Authorization: `Bearer ${jwt}` }
          }
        );
        if (!data) return console.log("Could not found this task, try again later.")

        task.value = data.data;
        isLoading.value = false;
      } catch (error) {
        console.error("An error has occurred obtaining the task, try again later.");
        console.error(error);
        isLoading.value = false;
      }
    }

    return {
      // Data
      session,
      task,
      // Utils
      router,
    }
  }
}
</script>