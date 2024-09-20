<script setup>
import Container from '../../components/container.vue';
import Tr from '../../components/Tilte.vue';
import inputfield from '../../components/inputfield.vue';
import error from '../../components/error.vue';

import { useForm } from '@inertiajs/vue3';

const form=useForm({
    password:'',
    password_confirmation:'',
})

const submit=()=>{
    console.log(form);
    form.post(route('password'))
}

</script>

<template>
 <Container>
  <Tr text="Set Password"/>

  <form @submit.prevent="submit">
     <inputfield type="password" label="Password" placeholder="Password" icon="key" v-model="form.password"/>
     <error v-if="form.errors.password">{{ form.errors.password }}</error>
     <inputfield type="password" label="Confirm Password" placeholder="Confirm Password" icon="key" v-model="form.password_confirmation"/>
     <error v-if="form.errors.password_confirmation">{{ form.errors.password_confirmation }}</error>

     <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300 disabled:opacity-15 disabled:cursor-wait" :disabled="form.processing">submit</button>

  </form>

 </Container>
</template>
