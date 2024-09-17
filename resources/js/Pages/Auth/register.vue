<script setup>
import container from '../../components/container.vue';
import Tilte from '../../components/Tilte.vue';
import textlink from '../../components/textlink.vue';
import inputfield from '../../components/inputfield.vue';
import error from '../../components/error.vue';
import { useForm } from '@inertiajs/vue3';

const form=useForm({
    username:null,
    email:null,
    password:null,
    password_confirmation:null,
})

const submit=()=>{
    console.log(form);
    form.post(route('register'),{
        onFinish:()=>form.reset('password','password_confirmation'),
    });
}

</script>

<template>
     <container>
      <Tilte text="Register a New User"/>
      <textlink text="Already have an account?" routename="view.login" link="Login" />

       <form @submit.prevent="submit">
         <inputfield label="Username" icon="user" placeholder="Username"  v-model="form.username"/>
          <error v-if="form.errors.username">{{ form.errors.username }}</error>
         <inputfield label="Email" icon="envelope" placeholder="Email" v-model="form.email"/>
         <error v-if="form.errors.email">{{ form.errors.email }}</error>
         <inputfield label="Password" icon="key" placeholder="Password" type="password" v-model="form.password"/>
         <error v-if="form.errors.password">{{ form.errors.password }}</error>
         <inputfield label="Confirm Password" icon="key" placeholder="Confirm Password" type="password" v-model="form.password_confirmation"/>
         <error v-if="form.errors.password_confirmation">{{ form.errors.password_confirmation }}</error>
         <p>By creating an account, you have agree to our <a href="" class=" text-blue-600 hover:underline">Term of Services</a> and <a href="" class=" text-blue-600 hover:underline">Privacy policy</a></p>


         <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300 disabled:opacity-15 disabled:cursor-wait" :disabled="form.processing">Register</button>
       </form>

     </container>
</template>
