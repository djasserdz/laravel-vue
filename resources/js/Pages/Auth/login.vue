<script setup>
import container from '../../components/container.vue';
import Tilte from '../../components/Tilte.vue';
import textlink from '../../components/textlink.vue';
import inputfield from '../../components/inputfield.vue';
import btn from '../../components/btn.vue';
import { useForm } from '@inertiajs/vue3';
import error from '../../components/error.vue';
import navlink from '../../components/navlink.vue'

const form=useForm({
    email:null,
    password:null,
    remember:false,
})

const submit=()=>{
    console.log(form);
    form.post(route('login'),{
        onFinish:()=>form.reset('password','password_confirmation'),
    });
}

</script>

<template>
     <container>
      <Tilte text="Login User"/>
      <textlink text="Dont have an account" routename="view.register" link="Register" />

      <error v-if="form.errors.false">{{ form.errors.false}}</error>

       <form @submit.prevent="submit">


         <inputfield label="Email" icon="envelope" placeholder="Email" v-model="form.email"/>
         <error v-if="form.errors.email">{{ form.errors.email}}</error>
         <inputfield label="Password" icon="key" placeholder="Password" type="password" v-model="form.password"/>
         <error v-if="form.errors.password">{{ form.errors.password}}</error>

          <div class="flex items-center justify-between">
            <label for=""><input type="checkbox" v-model="form.remember">Remember me?</label>
            <textlink link="Forgot Password?" routename="password.request"/>
          </div>




         <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300 disabled:opacity-15 disabled:cursor-wait" :disabled="form.processing">login</button>
       </form>

         <a :href="route('redirect')"><button>google</button></a>

     </container>
</template>
