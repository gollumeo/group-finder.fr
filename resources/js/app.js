import './bootstrap.js';
import {createApp} from 'vue'; // Importing createApp correctly
import {createPinia} from 'pinia';
import {instance} from "@/api-instance.js";
import App from '@/App.vue';
import {router} from '@/router/index.js';
import Toast, {useToast} from "vue-toastification";
import "vue-toastification/dist/index.css";
import {library} from '@fortawesome/fontawesome-svg-core'

const options = {
    // You can set your default options here
};

const pinia = createPinia();
const app = createApp(App);
const toaster = useToast();

// FA ICONS
import {
    faFilePdf,
    faCheck,
    faXmark,
} from "@fortawesome/free-solid-svg-icons";

library.add(
    faFilePdf,
    faCheck,
    faXmark
)

app
    .use(pinia)
    .use(Toast, options)
    .use(router)
    .mount('#app');

app.config.globalProperties.$toast = toaster;
app.config.globalProperties.$instance = instance;
app.config.globalProperties.$store = pinia;
