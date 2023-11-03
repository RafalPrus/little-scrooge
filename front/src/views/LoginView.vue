<template >
    <LoginBaseForm @submit="handleClick" />
    <div v-if="loginData.password">
        {{ loginData.password }}
    </div>
    <div v-if="tokenStore.token">
        {{ tokenStore.token }}
    </div>
    <div v-if="validationErrors.error">
        {{ validationErrors.error }}
    </div>
</template>
<script setup>
import { provide, reactive } from "vue";
import axios from 'axios';
import LoginBaseForm from '@/components/BaseForm/LoginBaseForm.vue';
import { useTokenStore } from "../stores/counter";

const tokenStore = useTokenStore()

const loginData = reactive({ email: '', password: ''})
const validationErrors = reactive({error: ''})
const res = reactive({mess: ''})

provide('loginData', loginData)
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
            tokenStore.token = response.data.token})
        .catch((error) => {
        console.log(error)
        validationErrors.error = error.response.data.message
    })

}
</script>
<style scoped>

</style>