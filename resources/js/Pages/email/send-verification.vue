<script setup>
import { ref, watch } from 'vue';
import { useForm } from '@inertiajs/vue3';
import Container from '../../components/container.vue';
import Title from '../../components/Tilte.vue';
import Error from '../../components/Error.vue';

const props = defineProps({
    status:String
});

const form = useForm({

});

const submit = () => {
    form.post(route('verification.send'));
}
</script>

<template>
  <Container>
    <Title text="Email Verification" />
    <p>Enter your email so we can send you a verification link.</p>

    <!-- Display flash message if present -->
    <p v-if="status">{{ status }}</p>


    <!-- Form with prevent default to handle submit via submit method -->
    <form @submit.prevent="submit">

      <button type="submit">Send</button>
    </form>
  </Container>
</template>

<style scoped>
.alert {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-bottom: 10px;
}
.alert-success {
  background-color: #d4edda;
  border-color: #c3e6cb;
  color: #155724;
}
.alert-danger {
  background-color: #f8d7da;
  border-color: #f5c6cb;
  color: #721c24;
}
</style>
