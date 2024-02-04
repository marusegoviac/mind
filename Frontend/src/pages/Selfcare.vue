<style scoped>
.bordered {
  border-inline: 1px solid rgb(241, 241, 241);
}
</style>

<template>
  <div class="container static h-screen bg-white">
    <div class="h-2/5">
      <img src="/src/assets/img/signin.jpg" class="h-full" />
    </div>
    <!-- <ContentCard></ContentCard> -->

    <!--Content Area-->
    <div class="bg-creme rounded-t-lg h-3/5 w-screen pt-10 px-10 pb-0">
      <h2 class="text-2xl text-black">Self Care</h2>
      <div class="my-4">
        <p class="text-sm text-medium-gray">
          Choisi la tâche que tu veux faire aujourdu’hui
        </p>
      </div>
      <div
        v-if="tasks && tasks.length"
        class="mt-0 bg-creme h-48 flex flex-no-wrap overflow-x-scroll scrolling-touch hide-scroll-bar items-start"
      >
        <Task
          v-for="task in tasks"
          :key="task.id"
          :title="task.task_title"
          :id="task.id"
          class="flex-none bg-mint h-36 w-28 my-5 mr-5 rounded-md text-center"
          @click.prevent="
            router.push({ name: 'Task', params: { id: task.id } })
          "
        />
      </div>
      <div
        v-else-if="isLoading && (!tasks || !tasks.length)"
        class="mx-auto mt-20"
      >
        <p class="text-medium-gray mx-10 text-center mt-4">Loading...</p>
      </div>
      <div v-else>
        <div class="mt-10 h-32">
          <img src="/src/assets/icons/philosophy.png" class="h-full mx-auto" />
          <p class="text-medium-gray mx-10 text-center mt-4">
            Oh, on dirait que vous n'avez aucune tâche en attente, détendez-vous
            et ajoutez une tâche.
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
import { inject, onMounted, ref, defineAsyncComponent } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";

export default {
  components: {
    Task: defineAsyncComponent(() => import("/src/components/Task.vue")),
  },
  setup() {
    const router = useRouter();

    // Inject
    const sessionValue = inject("session");
    const { session } = sessionValue.get();

    // Data
    const isLoading = ref(false);
    const tasks = ref([]);

    onMounted(() => getTasks());

    const getTasks = async () => {
      isLoading.value = true;
      const jwt = localStorage.getItem("jwt");

      try {
        const { data } = await axios.get(
          `${import.meta.env.VITE_API_URL}/auth/tasks`,
          {
            headers: { Authorization: `Bearer ${jwt}` },
          }
        );
        if (!data || !data.data || !data.data.length)
          return console.log("Looks that you dont have tasks.");

        tasks.value = data.data;
        isLoading.value = false;
      } catch (error) {
        console.error("An error has occurred querying tasks, try again later.", error);
        isLoading.value = false;
      }
    };

    return {
      // Data
      session,
      tasks,
      isLoading,
      // Utils
      router,
    };
  },
};
</script>
