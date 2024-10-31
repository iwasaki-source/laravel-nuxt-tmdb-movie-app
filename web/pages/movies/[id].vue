<template>
  <div v-if="movie">
    <h1>{{ movie.title }}</h1>
    <p>{{ movie.overview }}</p>
    <img
      :src="`https://image.tmdb.org/t/p/w500${movie.poster_path}`"
      v-if="movie.poster_path"
    >
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();
const movie = ref({});

const fetchMovie = async () => {
  const response = await fetch(`http://localhost/api/movies/${route.params.id}`);
  movie.value = await response.json();
}

onMounted(async () => {
  fetchMovie();
});
</script>