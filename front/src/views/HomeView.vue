<script setup>
import { useTokenStore } from "../stores/counter";

const tokenStore = useTokenStore()
</script>

<template>
  <main>
    Home
    <div v-if="tokenStore.token">
      <h1>{{ tokenStore.token }}</h1>
    </div>
  </main>
</template>
