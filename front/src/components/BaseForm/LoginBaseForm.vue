<template>
<div class="base-form">
    <form @submit.prevent>
        <h2>Login</h2>
        <div>
            <label>Email</label>
            <input type="text" required v-model="loginData.email">
        </div>
        <div>
            <label>Passoword</label>
            <input type="text" required v-model="loginData.password">
        </div>
        <button @click="handleClick">Zaloguj</button>
    </form>
</div>
</template>

<script setup>
import { inject } from "vue";

const loginData = inject('loginData')
</script>

<style scoped>
.base-form {
    width: max-content;
    margin: auto;
    display: block;
}

form {
    min-width: 300px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    border-radius: 12px;
    border: 0px;
    color:#424242;
    background-color: #f5f5f5;
}

input {
    padding: 0.4rem;
    border-radius: 6px;
    border: none;
}

label {
    margin-top: 1rem;
}

form div {
    display: flex;
    flex-direction: column;
}

h2 {
    text-align: center;
}

button {
    border: none;
    border-radius: 3px;
    padding: 0.6rem;
    margin-top: 15px;
    color: white;
    font-weight: bold;
    background-color: #2196f3;
}

button:hover  {
    background-color: #1976d2;
}
</style>