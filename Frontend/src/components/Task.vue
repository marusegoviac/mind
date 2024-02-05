<template>
  <div>
    <p class="text-medium-gray">{{ title }}</p>
  </div>
</template>

<script>
import { useRouter } from "vue-router";

export default {
  props: {
    title: {
      required: true,
      type: String,
    },
    id: {
      required: true,
      type: String,
    },
  },
  setup(props) {
    const router = useRouter();

    return {
      // Data
      router,
    };
  },
};
</script>
