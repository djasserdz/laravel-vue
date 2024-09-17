<script setup>
defineProps({
    text:{
        Required:true,
        type:String,
    }
})
</script>

<template>
  <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300 disabled:opacity-10 disabled:cursor-wait" >
    {{ text }}
  </button>
</template>
