<script setup>
import { useForm } from '@inertiajs/vue3';
import container from '../../components/container.vue';
import inputfield from '../../components/inputfield.vue';
import Tilte from '../../components/Tilte.vue';
import error from '../../components/error.vue';

const props=defineProps({
    status:String,
   email:String,
   request:String

})

const form=useForm({
    token:props.request,
    email:'',
    password:'',
    password_confirmation:'',
})

const submit=()=>{
    form.post(route('password.update'),{
        onFinish:()=>form.reset('password','password_confirmation'),
    })
}
</script>

<template>
<container>
    <Tilte text="Reset Password"/>

    <form @submit.prevent="submit">
        <p v-if="props.email">{{ props.email }}</p>
        <p v-if="props.status">{{ props.status }}</p>
        <inputfield label="Email" placeholder="email" icon="envelope" v-model="form.email"/>
        <error v-if="form.errors.email">{{ form.errors.email }}</error>
        <inputfield type="password"  label="Password" placeholder="Password" icon="key" v-model="form.password"/>
        <error v-if="form.errors.password">{{ form.errors.password }}</error>
        <inputfield type="password"  label="Password" placeholder="Password" icon="key" v-model="form.password_confirmation"/>
        <error v-if="form.errors.password_confirmation">{{ form.errors.password_confirmation }}</error>
        <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300 disabled:opacity-15 disabled:cursor-wait" :disabled="form.processing">Update</button>

    </form>

</container>
</template>


