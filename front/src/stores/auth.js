import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import { useLocalStorage } from "@vueuse/core"


export const useAuthStore = defineStore('auth', {
  state: () => ({
    token: useLocalStorage('pinia/auth/token', ''),
    name: useLocalStorage('pinia/auth/token', ''),
  }),
})
