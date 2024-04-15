<template class="bg-slate-900">
    <h1>Hello World</h1>
    <router-view></router-view>

</template>

<script>
export default {
    name: 'App.vue',
    mounted() {
        console.log('App.vue component mounted.');

        // Catch errors from the API using interceptor thing, so we can reject them and treat them in the components
        this.$instance.interceptors.response.use(
            (response) => {
                return response;
            },
            (error) => {
                console.log('Error:', error.response.data);
                return Promise.reject(error);
            }
        );
    }
}
</script>
