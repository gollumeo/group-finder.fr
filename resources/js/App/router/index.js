import {createRouter} from "vue-router";
import {createWebHistory} from "vue-router";

const routes = [
    {
        path: '',
        name: 'LandingPage',
        component: () => import('../views/LandingPage.vue'),
    },
    {
        path: '/laboratory',
        name: 'laboratory',
        component: () => import('../views/lab/Laboratory.vue'),
    },
]

export const router = createRouter({
    history: createWebHistory(),
    routes,
})
