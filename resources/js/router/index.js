import {createRouter} from "vue-router";
import {createWebHistory} from "vue-router";

const routes = [
    {

        path: '',
        name: 'home',
        component: () => import('../views/Home.vue'),
    },
]

export const router = createRouter({
    history: createWebHistory(),
    routes,
})
