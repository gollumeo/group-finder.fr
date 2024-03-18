import './bootstrap';
import { createApp } from 'vue'; // Importing createApp correctly
// import { createPinia } from 'pinia';
// import { apiInstance } from "./api-instance.js";
import App from './App.vue';
import { router } from './router';
import toast from "vue-toastification";

const app = createApp(App);

// const pinia = createPinia();

// app.config.globalProperties.$api = apiInstance;
app.config.globalProperties.$toast = toast;

app
    .use(router)
    .mount('#app');
