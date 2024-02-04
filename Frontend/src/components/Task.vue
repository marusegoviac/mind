<template>
  <div
    class="flex-none bg-mint h-36 w-28 my-5 mr-5 rounded-md text-center"
    @click.prevent="router.push({ name: 'Task', params: { id } })"
    >
    <img src="/src/assets/img/signin.jpg" class="h-10 my-7 mx-auto" />
    <p class="text-medium-gray">{{ title }}</p>
  </div>
</template>

<script>
import { useRouter } from 'vue-router';

export default {
  props:{
    title:{
      required: true,
      type: String,
    },
    id:{
      required: true,
      type: String,
    },
  },
  setup(props) {
    const router = useRouter();

    return {
      // Data
      router,
    }
  }
}
</script>