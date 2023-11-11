import { defineStore } from 'pinia'
import { useLocalStorage } from "@vueuse/core"
import axios from 'axios'


export const useAuthStore = defineStore('auth', () => {
  const token = useLocalStorage('pinia/auth/token', '')
  const login = useLocalStorage('pinia/auth/login', '')
  console.log('inside token auth store: ', token)

  function setUserLogin() {
    axios.get('http://127.0.0.1:8000/api/user', {
        headers: {
            'Authorization': 'Bearer ' + token.value,
            'content-type': 'application/json',
            'accept': 'application/json'
        }})
        .then((response) => {
          login.value = response.data.name
        })
        .catch((error) => {
          console.log(error)
        })
  }

  return { token, login, setUserLogin }
})