<script setup>
import { ref } from 'vue';
import { SwitchTheme } from '../theme';
import NavLink from '../components/NavLink.vue';
import { useForm } from '@inertiajs/vue3';


const isDropdownOpen = ref(false);


const toggleDropdown = () => {
  isDropdownOpen.value = !isDropdownOpen.value;
};


const switchTheme = () => {
  SwitchTheme();
};




</script>

<template>
  <header class="bg-slate-800 text-white shadow-lg">
    <nav class="p-4 mx-auto max-w-screen-lg flex items-center justify-between">
      <NavLink routename="home" text="Home" />

      <ul class="flex items-center justify-between">
        <li v-if="$page.props.auth" class="relative">

          <button @click="toggleDropdown" class="relative">
            {{ $page.props.auth.username }} &darr;
          </button>


          <div v-if="isDropdownOpen" class="absolute bg-white text-black rounded-lg shadow-lg mt-2 py-2 w-32">
            <a :href="route('profile.index')" class="block px-4 py-2 hover:bg-gray-200">Profile</a>
            <a href="#" class="block px-4 py-2 hover:bg-gray-200">Dashboard</a>
            <a :href="route('logout')">
                <button class="block w-full text-left px-4 py-2 hover:bg-gray-200">Logout</button>
            </a>
          </div>
        </li>

        <li v-else class="flex items-center justify-between">
          <li class="ml-2"><NavLink routename="view.register" text="Register" /></li>
          <li class="ml-2"><NavLink routename="view.login" text="Login" /></li>
        </li>


        <button @click="switchTheme" class="text-white hover:text-slate-300 ml-2">
          <i class="fa-solid fa-circle-half-stroke text-lg"></i>
        </button>
      </ul>
    </nav>
  </header>

  <main class="p-6 mx-auto max-w-screen-lg min-h-screen">
    <slot />
  </main>
</template>
