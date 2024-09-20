<script setup>
import container from '../../components/container.vue';
import Title from '../../components/Tilte.vue';
import inputfield from '../../components/inputfield.vue';
import error from '../../components/error.vue';
import { useForm } from '@inertiajs/vue3';

const props=defineProps({
    email:String,
    status:String
})

const form=useForm({
    email:'',
})

const submit=()=>{
    form.post(route('password.email'),{
        onFinish:()=>form.reset('email'),
    })
}
</script>

<template>
 <container>
  <Title text="Password Reset"/>

  <form @submit.prevent="submit" >
    <p v-if="props.email">{{ props.email }}</p>
    <p v-if="props.status">{{ props.status }}</p>
    <inputfield  label="Email" icon="envelope" placeholder="Email" v-model="form.email"/>
     <error v-if="form.errors.email">{{ form.errors.email }}</error>
    <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300 disabled:opacity-15 disabled:cursor-wait" :disabled="form.processing">send</button>
  </form>

 </container>
</template>
