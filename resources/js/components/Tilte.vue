<script setup>
defineProps({
    text:{
        Required:true,
        type:String,
    }
})
</script>

<template>
    <h1 class=" text-3xl dark: text-black">{{ text }}</h1>
</template>
