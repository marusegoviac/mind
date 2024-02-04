<style scoped>
.bordered {
  border-inline: 1px solid rgb(241, 241, 241);
}
</style>

<template>
  <div class="container static h-screen bg-white">
    <!--User button-->
    <button
      type="button"
      class="absolute top-4 right-4 p-3 text-sm font-medium text-gray bg-sunset rounded-full"
      @click="onLogout"
    >
      <!-- TODO: use an icon with an door and arrow pointing to out. -->
      <img src="/src/assets/icons/settings.png" class="h-6" />
      <!-- solid style -->
    </button>

    <div class="h-2/5">
      <img src="/src/assets/img/signin.jpg" class="h-full" />
    </div>
    <!-- <ContentCard></ContentCard> -->

    <!--Content Area-->
    <div class="bg-creme rounded-t-lg h-3/5 w-screen pt-10 px-10 pb-0">
      <h2 class="text-2xl text-black">Salut, {{ session?.name }}</h2>
      <div class="my-4">
        <p class="text-sm text-medium-gray">
          Choisi ce que tu veux faire aujourd'hui
        </p>
      </div>
      <div
        class="mt-0 bg-creme h-48 flex flex-no-wrap overflow-x-scroll scrolling-touch hide-scroll-bar items-start"
      >
        <!-- TODO: add a message when there are no tasks -->
        <Task
          v-for="task in tasks"
          :key="task.id"
          :title="task.task_title"
          :id="task.id"
          class="my-3 px-4"
        />
      </div>
      <div
        class="absolute bottom-3 mt-4 py-3 px-6 h-14 bg-white rounded-full justify-items-center"
      >
        <!-- TODO: componetize this. -->
        <div class="inline-flex rounded-full igems-center" role="group">
          <button
            type="button"
            class="px-7 py-2 text-sm font-medium text-gray bg-white"
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
import { inject, defineAsyncComponent, ref, onMounted } from "vue";
import { useRouter } from 'vue-router';
import axios from 'axios';

export default {
  components: {
    Task: defineAsyncComponent(() => import('/src/components/Task.vue')),
  },
  setup() {
    const router = useRouter();

    // Inject
    const sessionValue = inject('session');
    const { session } = sessionValue.get()

    // Data
    const isLoading = ref(false);
    const tasks = ref([])

    onMounted(() => getTasks());

    const onLogout = () => {
      sessionValue.logout();
      return router.push({ name: 'Login' })
    }

    const getTasks = async () => {
      isLoading.value = true;
      const jwt = localStorage.getItem('jwt');

      try {
        const { data } = await axios.get(`${import.meta.env.VITE_API_URL}/auth/tasks`,
          {
            headers: { Authorization: `Bearer ${jwt}` }
          }
        );
        if (!data || !data.data || !data.data.length) return console.log("Looks that you dont have tasks.")

        tasks.value = data.data;
        isLoading.value = false;
      } catch (error) {
        console.error("An error has occurred querying tasks, try again later.");
        console.error(error);
        isLoading.value = false;
      }
    }

    return {
      // Data
      session,
      tasks,
      // Functions
      onLogout,
      // Utils
      router,
    }
  }
}
</script>