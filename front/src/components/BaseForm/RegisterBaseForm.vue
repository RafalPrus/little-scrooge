<template>
<div class="base-form">
    <form @submit.prevent>
        <h2>Rejestracja</h2>
        <div>
            <label>Name</label>
            <input type="text" required v-model="registerData.name">
        </div>
        <div>
            <label>Email</label>
            <input type="text" required v-model="registerData.email">
        </div>
        <div>
            <label>Password</label>
            <input type="text" required v-model="registerData.password">
        </div>
        <button @click="handleRegisterClick">Zarejestruj</button>
        <div v-if="registerData.error">
            <p>{{ registerData.error }}</p>
        </div>
    </form>
</div>
</template>

<script setup>
import { inject } from "vue";

const { registerData, handleRegisterClick } = inject('registerData')
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

p {
    color: #DC2626;
    font-size: small;
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