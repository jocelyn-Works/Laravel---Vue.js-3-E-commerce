<template>

        <userSignup />

        <router-link :to="{ name :'login'} " ><div class="btn btn-secondary">Connexion</div></router-link>

</template>

<script>
import userSignup from '@/components/userSignup.vue';
export default {
    components: {
        userSignup
    },

}
</script>

<style scoped>

</style>