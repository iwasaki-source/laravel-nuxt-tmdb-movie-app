<template>
  <div>
    <h1>{{ message }}</h1>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const message = ref('Loading...');

onMounted(async () => {
  try {
    const response = await fetch('http://localhost/api/hello');
    const data = await response.json();
    message.value = data.message;
  } catch (error) {
    message.value = 'Error fetching message';
  }
});
</script>

<style scoped>
h1 {
  color: #333;
}
</style>
