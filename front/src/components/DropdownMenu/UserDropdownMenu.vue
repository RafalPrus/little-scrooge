<template>
    <div>
    <div class="dropdown">
      <slot></slot>
      <div class="dropdown-content">
        <a href="billing">Billing</a>
        <a href="settings">Settings</a>
        <a @click.prevent="handleClick" href="">Logout</a>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useAuthStore } from "@/stores/auth.js"

const authStore = useAuthStore()

const handleClick = () => {
  authStore.token = ''
  authStore.name = ''
}
</script>
<style scoped>

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 120px;
  border-radius: 12px;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

a {
    font-size: 0.8rem;
}

.dropdown-content a:first-child {
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
}

.dropdown-content a:last-child {
    border-bottom-left-radius: 12px;
    border-bottom-right-radius: 12px;
}

.dropdown-content a:hover {
    background-color: hsla(160, 100%, 37%, 1);
}

.dropdown-content a:first-child:hover {
  border-top-left-radius: 12px;
  border-top-right-radius: 12px;
}

.dropdown-content a:last-child:hover {
  border-bottom-left-radius: 12px;
  border-bottom-right-radius: 12px;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>