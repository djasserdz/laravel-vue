<script setup>
import container from '../../components/container.vue';
import Tilte from '../../components/Tilte.vue';
import inputfield from '../../components/inputfield.vue';
import error from '../../components/error.vue';
import  {useForm}  from '@inertiajs/vue3';


const props=defineProps({
    updated:String,
    user:Object,
    status:String,
})




const form=useForm({
    username:props.user.username,
    email:props.user.email,
});

const submit=()=>{
    console.log(props.user);
    form.put(route('profile.update'));
}
</script>

<template>
<Tilte text="Profile"/>
<container >
    <Tilte text="update information"/><br>
    <p>Update information username or email</p>
    <p v-if="updated">{{ updated }}</p>
    <p v-if="status">{{ status }}</p>
    <form @submit.prevent="submit">
    <inputfield icon="user" placeholder="username" label="username" v-model="form.username" />
     <error v-if="form.errors.username">{{ form.errors.username }}</error>
    <inputfield icon="envelope" placeholder="email" label="email" v-model="form.email" />
    <error v-if="form.errors.email">{{ form.errors.email }}</error>

    <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300 disabled:opacity-15 disabled:cursor-wait" :disabled="form.processing">Update</button>

    </form>
</container>

<container >
    <Tilte text="Delete account"/><br>
    <p>deleting account</p>
    <form @submit.prevent="form.delete(route('profile.delete'))">

    <button class="px-4 py-2 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300 disabled:opacity-15 disabled:cursor-wait" :disabled="form.processing">Delete</button>

    </form>
</container>

</template>
