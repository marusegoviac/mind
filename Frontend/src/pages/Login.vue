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
            >
              Me connecter
            </button>
          </div>
        </form>

        <p class="my-5 text-center text-sm text-medium-gray">
          Tu n'as pas un compte ?
          {{ " " }}
          <a href="#" class="font-semibold leading-6 text-midnight"
            >S'enregistrer</a
          >
        </p>
      </div>
    </div>
  </div>
</template>
