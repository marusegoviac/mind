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
      <h2 class="inline text-2xl text-black">Task</h2>
    </div>
    <div class="h-4/5">
      <div class="my-4">
        <p class="text-md text-gray">
          Objectif
        </p>
				<p class="text-sm text-medium-gray my-5">
					Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores quibusdam nesciunt rem odio?
				</p>
      </div>

			<div class="my-4">
        <p class="text-md text-gray">
          Instructions
        </p>
				<p class="text-sm text-medium-gray my-5">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam quaerat odio beatae. Nam eum delectus repellendus explicabo illo? Harum dignissimos repellendus voluptas obcaecati similique tempore consectetur quos veniam dolorum sunt?
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam quaerat odio beatae. Nam eum delectus repellendus explicabo illo?
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
import { inject } from "vue";
import { useRouter } from 'vue-router';

export default {
  setup() {
    const router = useRouter();

    // Inject
    const sessionValue = inject('session');
    const { session } = sessionValue.get()

    const onLogout = () => {
      sessionValue.logout();
      return router.push({ name: 'Login' })
    }

    return {
      // Data
      session,
      // Functions
      onLogout,
      // Utils
      router,
    }
  }
}
</script>