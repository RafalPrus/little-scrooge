<script setup>
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore()
</script>

<template>
  <main>
    Home
    <div v-if="authStore.token">
      <h1>{{ authStore.token }}</h1>
    </div>
  </main>
</template>
