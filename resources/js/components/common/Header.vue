<template>
    <header class="header border-bottom">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div class="logo-container">
                    <router-link to="/">
                        <img src="../../../assets/images/iitu-logo.png"
                             class="logo"
                             alt="logo">
                    </router-link>
                </div>
                <div>
                    <button @click="logout" class="btn btn-warning">Выйти</button>
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
