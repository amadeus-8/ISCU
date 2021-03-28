<template>
    <div class="h-100">
        <Header v-if="isLoggedIn" />
        <div class="container h-100">
            <div :class="isLoggedIn ? 'main row h-100' : 'row h-100'">
                <div class="col-md-3" v-if="isLoggedIn">
                    <Sidebar />
                </div>
                <div :class="isLoggedIn ? 'col-md-9' : ''">
                    <router-view></router-view>
                </div>
            </div>
        </div>
        <Preloader />
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'
    import Header from "./common/Header"
    import Sidebar from "./common/Sidebar"
    import Preloader from "./common/Preloader";

    export default {
        name: "App",
        computed: {
            ...mapGetters(['GET_IS_LOGGED_IN']),
            isLoggedIn() {
                return this.GET_IS_LOGGED_IN
            }
        },
        components: {
            Preloader,
            Sidebar,
            Header
        }
    }
</script>
