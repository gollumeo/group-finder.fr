import './bootstrap';
import {createApp} from 'vue'; // Importing createApp correctly
import {createPinia} from 'pinia';
import {instance} from "./api-instance.js";
import App from './App.vue';
import {router} from './router';
import toast from "vue-toastification";

const pinia = createPinia();
const app = createApp(App);


// app.config.globalProperties.$api = apiInstance;
app.config.globalProperties.$toast = toast;
app.config.globalProperties.$instance = instance;

app
    .use(pinia)
    .use(router)
    .mount('#app');

app.config.globalProperties.$store = pinia;
