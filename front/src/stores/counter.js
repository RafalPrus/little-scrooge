import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import { useLocalStorage } from "@vueuse/core"


export const useTokenStore = defineStore('auth', {
  state: () => ({
    token: useLocalStorage('pinia/auth/toke', ''),
  }),
})
