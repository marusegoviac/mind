<template>
  <router-view></router-view>
</template>

<script>
import { ref, computed, defineComponent, provide, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import axios from "axios";
const API_URL = import.meta.env.VITE_API_URL

export default defineComponent({
  name: "App",
  setup() {
    const router = useRouter();
    const route = useRoute();
    // Functions
    const onLogout = async () => {
      const jwt = localStorage.getItem('jwt');
      try {
        await axios.get(`${API_URL}/auth/logout`, {
          headers: { Authorization: `Bearer ${jwt}` }
        });
        // success('See you later'); // TODO: see if we can implement notifications.
        await new Promise((resolve) => setTimeout(resolve, 10000));
        isActiveSession();
      } catch (error) {
        console.error(error);
      }
    }

    const isActiveSession = async () => {
      const jwt = localStorage.getItem('jwt');
      try {
        const { data } = await axios.get(`${API_URL}/auth/user`, {
          headers: { Authorization: `Bearer ${jwt}` }
        });
        console.log('obtained session: ', data);
        if (!data) console.error("Cannot obtain the session data");

        session.value = data;
        localStorage.setItem('jwt', JSON.stringify(data.accessToken));

        if ((route.name == 'Signup' || route.name == 'Login')) {
          return router.push({ name: 'Dashboard' })
        }

      } catch (error) {
        console.error(error);
      }
    }

    // Inject 
    const session = ref(false);

    provide('session', {
      get: () => {
        return {
          session: computed(() => session.value),
          active: isActiveSession()
        }
      },
      logout: onLogout,
      active: isActiveSession,
    })

    onMounted(() => {
      isActiveSession();
    });

  }
})
</script>
