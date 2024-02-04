<template>
  <div class="container h-screen bg-white">
    <div>
      <img src="/src/assets/img/signin.jpg" class="w-screen"/>
    </div>
    <div class="bg-creme rounded-t-lg h-3/4 w-screen p-10">
      <h2 class="text-2xl text-black">S'enregistrer</h2>

      <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="#" method="POST">

					<div>
            <label
              for="name"
              class="block text-sm text-medium-gray"
              >Prénom</label
            >
            <div class="mt-2">
              <input
                v-model.trim="dataForm.name"
                id="name"
                name="name"
                type="text"
                autocomplete="name"
								placeholder="Écris ton prénom"
                required=""
                class="block w-full outline-none rounded-lg border-0 p-3 text-medium-gray placeholder:text-light-gray text-sm"
              />
            </div>
          </div>

          <div>
            <label
              for="email"
              class="block text-sm text-medium-gray"
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
              <label
                for="password"
                class="block text-sm text-medium-gray"
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
              @click.prevent="onSignUp()"
            >
              {{ isLoading ? "Loading ..." : "Suivant" }}
            </button>
          </div>
        </form>

        <p class="mt-10 text-center text-sm text-medium-gray">
          Tu as déjà un compte ?
          {{ " " }}
          <a
            href="#"
            class="font-semibold leading-6 text-midnight"
            >Se connecter</a
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
      name: '',
      email: '',
      password: '',
    })
    
    // * Sign up user *
    const onSignUp = async () => {
      const { name, email, password } = dataForm.value;
      const regExEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/

      console.log({name, email, password})
      if (!name || !email || !password) {
        // TODO: user toaster
        return console.error("All fields are required to sign up");
      }
      if (password.length < 8) {
        return console.error("Please enter a strong password");
      }
      if (!regExEmail.test(email)) {
        return console.error("Please enter a valid email");
      }

      isLoading.value = true;
      try {
        const { data } = await axios.post(`${import.meta.env.VITE_API_URL}/auth/register`, {
          name,
          email,
          password
        });
        if (!data.accessToken) return console.error("An error has occurred registering, try again later.");

        // Update session value and redirect to dashboard
        localStorage.setItem('jwt', data.accessToken);
        isLoading.value = false;
        sessionValue.active();
      } catch (error) {
        console.error(error);
        isLoading.value = false;
      }
    }

    return {
      // Data
      dataForm,
      isLoading,
      // Functions
      onSignUp,
      // Utils
      router,
    }
  }
}
</script>