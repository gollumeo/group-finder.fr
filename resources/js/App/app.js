import '../bootstrap.js';
import {createApp} from 'vue'; // Importing createApp correctly
import {createPinia} from 'pinia';
import {instance} from "./api-instance.js";
import App from '@/App.vue';
import {router} from './router/index.js';
import toast from "vue-toastification";
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

const pinia = createPinia();
const app = createApp(App);

// FA ICONS
import {
   faFilePdf
} from "@fortawesome/free-solid-svg-icons";
library.add(
    faFilePdf
)

// app.config.globalProperties.$api = apiInstance;
app.config.globalProperties.$toast = toast;
app.config.globalProperties.$instance = instance;

app
    .use(pinia)
    .use(router)
    .mount('#app');

app.config.globalProperties.$store = pinia;
