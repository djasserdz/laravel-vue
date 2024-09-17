<script setup>
import { defineProps } from 'vue';

defineProps({
  routename: {
    required: true,
    type: String,
  },
  text: {
    type: String,
  },
});
</script>

<template>
  <Link
    :href="route(routename)"
    class="text-white bg-sky-500 hover:bg-sky-600 px-4 py-2 rounded-lg transition duration-300 ease-in-out"
  >
    {{ text }}
  </Link>
</template>
