<template>
    <router-view></router-view>
</template>

<script>
export default {
    name: 'App.vue',
    mounted() {
        console.log(this.$route);
    }
}
</script>
