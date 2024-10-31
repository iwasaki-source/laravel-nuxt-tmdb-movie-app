<template>
  <div>
    <h1>Movie</h1>
    <div>Page: {{ currentPage }}</div>
    <div
      v-for="movie in movies"
      :key="movie.id"
    >
    <!-- <div>{{ movie.title }}</div> -->
    <NuxtLink :to="`/movies/${movie.id}`">{{ movie.title }}</NuxtLink>
    </div>
    <button @click="fetchMovies(currentPage+1)">Next</button>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const movies = ref([]);
let currentPage = null;
const fetchMovies = async (page = 1) => {
  const response = await fetch(`http://localhost/api/movies?page=${page}`);
  const data = await response.json();
  currentPage = data.current_page;
  movies.value = data.data;
}

onMounted(() => {
  fetchMovies();
});
</script>
