
<template>
  <header>
    <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="125" height="125" />
    <div class="wrapper">
      <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink :to="{name: 'register'}" v-if="! authStore.token">Register</RouterLink>
        <RouterLink :to="{name: 'login'}" v-if="! authStore.token">Login</RouterLink>
        <div class="menu" v-if="authStore.token">
          Welcome, 
          <UserDropdownMenu>
            <a @click.prevent>{{ authStore.login }}</a>
          </UserDropdownMenu>
        </div>
      </nav>
    </div>
  </header>
    <RouterView />
</template>

<script setup>

import { useAuthStore } from "@/stores/auth.js";

import UserDropdownMenu from "@/components/DropdownMenu/UserDropdownMenu.vue"

const authStore = useAuthStore()

console.log('token: ', authStore.token)

const handleClick = () => {
  authStore.token = ''
}
</script>

<style scoped>
header {
  line-height: 1.5;
  max-height: 100vh;
  padding: 1rem;
  justify-content: space-between;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin: 2rem auto;
  display:flex;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav > a {
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav > div {
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

div > a {
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

.menu {
  display: flex;
  flex-direction: row;
}


nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    flex-wrap: wrap;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
}
@media (max-width: 1024px) {
  nav{
    justify-content:center ;
  }

  nav > div {
    padding: 0;
    padding-left: 1rem;
  }
}
</style>
