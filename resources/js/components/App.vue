<template>
    <div class="h-100">
        <Header v-if="isLoggedIn" />
        <div class="container h-100">
            <div class="main row h-100">
                <div class="col-md-3" v-if="isLoggedIn">
                    <Sidebar />
                </div>
                <div :class="isLoggedIn ? 'col-md-9' : ''">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Header from "./common/Header"
    import Sidebar from "./common/Sidebar"
    import {mapGetters} from 'vuex'

    export default {
        name: "App",
        computed: {
            ...mapGetters(['GET_IS_LOGGED_IN']),
            isLoggedIn() {
                return this.GET_IS_LOGGED_IN
            }
        },
        components: {
            Header,
            Sidebar
        }
    }
</script>

<style scoped>

</style>
