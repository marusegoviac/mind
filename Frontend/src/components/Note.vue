<template>
  <div>
    <div
      class="mb-2"
    >
      <p class="text-gray text-md">{{ text }}</p>
    </div>
    <div>
      <p class="text-medium-gray text-sm">{{ content }}</p>
    </div>
  </div>
</template>

<script>

export default {
  props:{
    text:{
      required: true,
      type: String,
    },
    content: {
      required: true,
      type: String,
    },
  },
  setup(props) {

    return {
      // Data
    }
  }
}
</script>