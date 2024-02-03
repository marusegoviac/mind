<template>
  <router-view></router-view>
</template>

<script>
import { ref, computed, defineComponent, provide } from 'vue';
import { success } from "src/utils/notify";
import axios from "axios";

export default defineComponent({
  name: "App",
  setup() {
    // Inject 
    const session = ref(false);
    const userInfo = ref(false);

    provide('session', {
      get: () => {
        return {
          session: computed(() => session.value),
          info: computed(() => userInfo.value),
          active: isActiveSession()
        }
      },
      logout: onLogout,
    })

    // Functions
    const onLogout = async () => {
      try {
        await axios.get(`${process.env.API_URL}/auth/logout`);
        success('See you later');
        await new Promise((resolve) => setTimeout(resolve, 10000));
        cleanSession();
      } catch (error) {
        console.error(error);
      }
    }

    const cleanSession = () => {
      session.value = false;
      userInfo.value = false;
      // TODO: clean LS login info.
    }

    // TODO: when user login, save on LS all info.
  }
})
</script>
