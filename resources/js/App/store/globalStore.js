// pinia
import {defineStore} from 'pinia';
import {instance} from "../api-instance.js";

export const useGlobalStore = defineStore({
    id: 'globalStore',
    state: () => ({
        user: null,
        token: null,
        loading: false,
        error: null,
    }),
    actions: {
        async login(email, password) {
            try {
                this.loading = true;
                const response = await instance.post('/login', {
                    email,
                    password,
                });
                this.user = response.data.user;
                this.token = response.data.token;
            } catch (error) {
                this.error = error.response.data.message;
            } finally {
                this.loading = false;
            }
        },
        async logout() {
            try {
                this.loading = true;
                await instance.post('/logout');
                this.user = null;
                this.token = null;
            } catch (error) {
                this.error = error.response.data.message;
            } finally {
                this.loading = false;
            }
        },
    },
    getters: {
        isLoggedIn() {
            return !!this.user;
        },
    },
})
