<template >
    <RegisterBaseForm />
    <div v-if="validationErrors.error">
        {{ validationErrors.error }}
    </div>
</template>
<script setup>
import { provide, reactive } from "vue";
import { useRouter } from 'vue-router'

import axios from 'axios';
import RegisterBaseForm from '@/components/BaseForm/RegisterBaseForm.vue';
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore()

const registerData = reactive({ name: '', email: '', password: '', error: ''})
const validationErrors = reactive({error: ''})
const res = reactive({mess: ''})
const router = useRouter()

provide('registerData', registerData)
const handleRegisterClick = () => {
    console.log('register log')
    axios.post('http://127.0.0.1:8000/api/register', {
        name: registerData.name,
        email: registerData.email,
        password: registerData.password}, {
        headers: {
            'content-type': 'application/json',
            'accept': 'application/json'
        }})
        .then((response) => {
            console.log(response)
            authStore.token = response.data.token
            registerData.error = ''
            authStore.setUserLogin()
            router.push({name: 'home'})
            console.log('pushed?')
        })
        .catch((error) => {
            console.log(error)
            registerData.error = error.response
        })

}

provide('registerData', {
    registerData,
    handleRegisterClick
    })
</script>
<style scoped>

</style>