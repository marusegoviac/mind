<template>
  <div class="grid grid-cols-10 bg-mint h-20 w-full mb-5 py-3 px-5 rounded-md">
    <div class="col-span-9">
      <div class="mb-2">
        <p class="text-gray text-md">{{ text }}</p>
      </div>
      <div class="">
        <p class="text-medium-gray text-sm">{{ content }}</p>
      </div>
    </div>
    <div class="col-1">
      <button
        type="button"
        class="p-0 text-sm font-medium text-gray bg-transparent rounded-full"
      >
        <img src="/src/assets/icons/trash.png" class="h-6 w-8" />
        <!-- solid style -->
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    text: {
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
    };
  },
};
</script>
