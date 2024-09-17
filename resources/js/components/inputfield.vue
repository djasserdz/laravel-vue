<script setup>
defineProps({
  icon: {
    required: true,
    type: String,
  },
  label: {
    required: true,
    type: String,
  },
  type: {
    type: String,
    default: 'text',
  },
  placeholder: {
    type: String,
    default: '',
  },
  modelValue: String,

});

</script>

<template>
  <div class="mb-4">
    <label class="block mb-2 text-gray-700">{{ label }}</label>
    <div class="flex items-center space-x-2 border border-gray-300 p-2 rounded-lg">
      <!-- Dynamic class binding for icon -->
      <i :class="`fa-solid fa-${icon} text-gray-500`"></i>
      <input
        :type="type"
        :placeholder="placeholder"
        :value="modelValue"
        @input="$emit('update:modelValue',$event.target.value)"
        class="w-full p-2 border-none outline-none text-gray-700"
      >
    </div>
  </div>
</template>
