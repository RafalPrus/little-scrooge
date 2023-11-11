<template >
    <LoginBaseForm />
    <div v-if="loginData.password">
        {{ loginData.password }}
    </div>
    <div v-if="authStore.token">
        {{ authStore.token }}
    </div>
    <div v-if="validationErrors.error">
        {{ validationErrors.error }}
    </div>
</template>
<script setup>
import { provide, reactive } from "vue";
import axios from 'axios';
import LoginBaseForm from '@/components/BaseForm/LoginBaseForm.vue';
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore()

const loginData = reactive({
    email: '',
    password: ''
})
const validationErrors = reactive({error: ''})
const res = reactive({mess: ''})

const handleClick = () => {
    axios.post('http://127.0.0.1:8000/api/login', {
        email: loginData.email,
        password: loginData.password}, {
        headers: {
            'content-type': 'application/json',
            'accept': 'application/json'
        }})
        .then((response) => {
            console.log(response)
            authStore.token = response.data.token
            authStore.setUserLogin()
        })
        .catch((error) => {
            console.log(error)
            validationErrors.error = error.response.data.message
        })

}

provide('loginData', {
    loginData,
    handleClick
    })
</script>
<style scoped>

</style>