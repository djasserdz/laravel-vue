<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    text:{
        required:true,
        type:String,
    },
    routename:{
        required:true,
        type:String,
    },
    link:{
        required:true,
        type:String,
    }
})
</script>

<template>
    <p class=" text-lg">{{ text }} <a :href="route(routename)" class=" text-blue-600 hover:underline">{{ link }}</a></p>
</template>
