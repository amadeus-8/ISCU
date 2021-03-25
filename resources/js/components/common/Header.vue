<template>
    <header class="header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div class="logo-container">
                    <img src="../../../assets/images/iitu-logo.png"
                         class="logo"
                         alt="logo">
                </div>
                <div>
                    <button @click="logout">Выйти</button>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
    import {mapMutations} from 'vuex'

    export default {
        name: "Header",

        methods: {
            ...mapMutations(['LOGOUT']),
            logout() {
                this.LOGOUT()
                this.$router.push({name: 'login'})
            }
        }
    }
</script>

<style scoped>

</style>
