<script setup>
/*import ContentCard from '../components/ContentCard.vue';*/
</script>

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
      class="absolute top-2 right-2 p-2 text-sm font-medium text-gray bg-sunset rounded-full"
    >
      <img src="/src/assets/icons/house.png" class="h-8" />
    </button>

    <div class="h-2/5">
      <img src="/src/assets/img/signin.jpg" class="h-full" />
    </div>
    <!-- <ContentCard></ContentCard> -->

    <!--Content Area-->
    <div class="bg-creme rounded-t-lg h-3/5 w-screen pt-10 px-10 pb-0">
      <h2 class="text-2xl text-black">Salut, Maria</h2>
      <div class="my-4">
        <p class="text-sm text-medium-gray">
          Choisi ce que tu veux faire aujourd'hui
        </p>
      </div>
      <div
        class="mt-0 bg-creme h-48 flex flex-no-wrap overflow-x-scroll scrolling-touch hide-scroll-bar items-start"
      >
        <div
          class="flex-none bg-mint h-36 w-28 my-5 mr-5 rounded-md text-center"
        >
          <img src="/src/assets/img/signin.jpg" class="h-10 my-7 mx-auto" />
          <p class="text-medium-gray">Self Care</p>
        </div>
        <div
          class="flex-none bg-mint h-36 w-28 my-5 mr-5 rounded-md text-center"
        >
          <img src="/src/assets/img/signin.jpg" class="h-10 my-7 mx-auto" />
          <p class="text-medium-gray">Self Care</p>
        </div>
        <div
          class="flex-none bg-mint h-36 w-28 my-5 mr-5 rounded-md text-center"
        >
          <img src="/src/assets/img/signin.jpg" class="h-10 my-7 mx-auto" />
          <p class="text-medium-gray">Self Care</p>
        </div>
        <div
          class="flex-none bg-mint h-36 w-28 my-5 mr-5 rounded-md text-center"
        >
          <img src="/src/assets/img/signin.jpg" class="h-10 my-7 mx-auto" />
          <p class="text-medium-gray">Self Care</p>
        </div>
        <div
          class="flex-none bg-mint h-36 w-28 my-5 mr-5 rounded-md text-center"
        >
          <img src="/src/assets/img/signin.jpg" class="h-10 my-7 mx-auto" />
          <p class="text-medium-gray">Self Care</p>
        </div>
      </div>
      <div
        class="absolute bottom-3 mt-4 py-3 px-6 h-14 bg-white rounded-full justify-items-center"
      >
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
