<template>
  <div class="container h-screen bg-white">
    <div class="h-2/5">
      <img src="/src/assets/img/signin.jpg" class="h-full" />
    </div>
    <div class="bg-creme rounded-t-lg h-3/5 w-screen p-10">
      <h2 class="text-2xl text-black">Se connecter</h2>

      <div class="mt-5">
        <form class="space-y-6" action="#" method="POST">

          <div>
            <label for="email" class="block text-sm text-medium-gray"
              >E-mail</label
            >
            <div class="mt-2">
              <input
                v-model.trim="dataForm.email"
                id="email"
                name="email"
                type="email"
                autocomplete="email"
                placeholder="exemple@exemple.com"
                required=""
                class="block w-full outline-none rounded-lg border-0 p-3 text-medium-gray placeholder:text-light-gray text-sm"
              />
            </div>
          </div>

          <div>
            <div class="flex items-center justify-between">
              <label for="password" class="block text-sm text-medium-gray"
                >Mot de passe</label
              >
            </div>
            <div class="mt-2">
              <input
                v-model.trim="dataForm.password"
                id="password"
                name="password"
                type="password"
                autocomplete="current-password"
                placeholder="********"
                required=""
                class="block w-full outline-none rounded-lg border-0 p-3 text-medium-gray placeholder:text-light-gray text-sm"
              />
            </div>
          </div>

          <div>
            <button
              type="submit"
              :disabled="isLoading"
              class="flex w-full justify-center rounded-lg bg-midnight p-3 text-md text-white"
              @click.prevent="onSignIn()"
            >
              Me connecter
            </button>
          </div>
        </form>

        <p class="my-5 text-center text-sm text-medium-gray">
          Tu n'as pas un compte ?
          {{ " " }}
          <a href="#" class="font-semibold leading-6 text-midnight" @click.prevent="router.push({ name: 'Signup' })"
            >S'enregistrer</a
          >
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import { inject, ref } from "vue";
import { useRouter } from 'vue-router';
import axios from "axios";

export default {
  setup() {
    const router = useRouter();

    // Inject
    const sessionValue = inject('session');

    const isLoading = ref(false);
    const dataForm = ref({
      email: '',
      password: '',
    })
    
    // * Sign in user *
    const onSignIn = async () => {
      const { email, password } = dataForm.value;
      const regExEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/

      if (!email || !password) {
        // TODO: user toaster
        return console.error("All fields are required to sign in");
      }
      if (password.length < 8) {
        return console.error("Please enter a strong password");
      }
      if (!regExEmail.test(email)) {
        return console.error("Please enter a valid email");
      }

      isLoading.value = true;
      try {
        const { data } = await axios.post(`${import.meta.env.VITE_API_URL}/auth/login`, {
          email,
          password
        });
        if (!data.accessToken) return console.error("An error has occurred while login, try again later.");

        // Update session value and redirect to dashboard
        localStorage.setItem('jwt', data.accessToken);
        isLoading.value = false;
        sessionValue.active();
      } catch (error) {
        console.error("Username or password incorrect, check your data and try again");
        isLoading.value = false;
      }
    }

    return {
      // Data
      dataForm,
      isLoading,
      // Functions
      onSignIn,
      // Utils
      router,
    }
  }
}
</script>