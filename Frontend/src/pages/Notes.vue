<style scoped>
.bordered {
  border-inline: 1px solid rgb(241, 241, 241);
}

.notes-container {
  height: 70%;
}
</style>

<template>
  <div class="container static h-screen bg-white">
    <div class="h-1/5">
      <img src="/src/assets/img/signin.jpg" class="h-full" />
    </div>
    <!-- <ContentCard></ContentCard> -->

    <!--Content Area-->
    <div class="bg-creme rounded-t-lg h-4/5 w-screen pt-10 px-10 pb-0">
      <h2 class="text-2xl text-black">Mes notes</h2>
      <div
        class="my-5 bg-creme notes-container overflow-scroll scrolling-touch hide-scroll-bar items-start"
      >
        <div class="bg-mint h-20 w-full mb-5 py-3 px-5 rounded-md">
          <div
            class="mb-2"
            @click.prevent="router.push({ name: 'Note' })"
          >
            <p class="text-gray text-md">Premier jour</p>
          </div>
          <div>
            <p class="text-medium-gray text-sm">01/01/2024</p>
          </div>
        </div>
        <div class="bg-mint h-20 w-full mb-5 py-3 px-5 rounded-md">
          <div
            class="mb-2"
            @click.prevent="router.push({ name: 'Note' })"
          >
            <p class="text-gray text-md">Premier jour</p>
          </div>
          <div>
            <p class="text-medium-gray text-sm">01/01/2024</p>
          </div>
        </div>
        <div class="bg-mint h-20 w-full mb-5 py-3 px-5 rounded-md">
          <div
            class="mb-2"
            @click.prevent="router.push({ name: 'Note' })"
          >
            <p class="text-gray text-md">Premier jour</p>
          </div>
          <div>
            <p class="text-medium-gray text-sm">01/01/2024</p>
          </div>
        </div>
        <div class="bg-mint h-20 w-full mb-5 py-3 px-5 rounded-md">
          <div
            class="mb-2"
            @click.prevent="router.push({ name: 'Note' })"
          >
            <p class="text-gray text-md">Premier jour</p>
          </div>
          <div>
            <p class="text-medium-gray text-sm">01/01/2024</p>
          </div>
        </div>
        <div class="bg-mint h-20 w-full mb-5 py-3 px-5 rounded-md">
          <div
            class="mb-2"
            @click.prevent="router.push({ name: 'Note' })"
          >
            <p class="text-gray text-md">Premier jour</p>
          </div>
          <div>
            <p class="text-medium-gray text-sm">01/01/2024</p>
          </div>
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
            @click.prevent="router.push({ name: 'Selfcare' })"
          >
            <img src="/src/assets/icons/love.png" class="h-5 w-6" />
          </button>
          <button
            type="button"
            class="px-7 py-2 text-sm font-medium text-gray bg-white"
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

    return {
      // Data
      session,
      // Utils
      router,
    }
  }
}
</script>