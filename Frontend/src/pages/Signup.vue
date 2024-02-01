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
              class="flex w-full justify-center rounded-lg bg-midnight p-3 text-md text-white"
              @click="register()"
            >
              Suivant
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


</script>