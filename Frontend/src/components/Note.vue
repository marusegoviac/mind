<template>
  <div class="grid grid-cols-10 bg-mint h-20 w-full mb-5 py-3 px-5 rounded-md">
    <div class="col-span-9">
      <div class="mb-2">
        <p class="text-gray text-md">{{ text.substring(0, 25) + "..." }}</p>
      </div>
      <div class="">
        <p class="text-medium-gray text-sm">{{ content.substring(0, 30) + "..." }}</p>
      </div>
    </div>
    <div class="col-1">
      <button
        type="button"
        class="p-0 text-sm font-medium text-gray bg-transparent rounded-full"
        :disabled="isLoading"
        @click.prevent="onDelete()"
      >
        <img src="/src/assets/icons/trash.png" class="h-6 w-8" />
        <!-- solid style -->
      </button>
    </div>
  </div>

</template>

<script>
import { inject, ref } from "vue";
import axios from "axios";

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
    id: {
      required: true,
      type: [String, Number],
    },
  },
  setup(props) {
    const isLoading = ref(false);

    // Inject
    const notesProvider = inject("notes");

    // * Send the delete request to API *
    const onDelete = async () => {
      isLoading.value = true;
      const jwt = localStorage.getItem("jwt");

      try {
        await axios.delete(
          `${import.meta.env.VITE_API_URL}/auth/notes/${props.id}`,
          {
            headers: { Authorization: `Bearer ${jwt}` },
          }
        );
        notesProvider.request();
        isLoading.value = false;
      } catch (error) {
        console.error(error);
        isLoading.value = false;
      }
    };

    return {
      onDelete,
      isLoading,
    };
  },
};
</script>
