<template>
    <div class="mt-3 custom-nav" v-if="currentUser.role === 'ADVISER'">
        <div v-for="(link, index) in links"
             :key="index">
            <router-link :to="link.path"
                         class="custom-link">{{link.name}}</router-link>
        </div>
    </div>
</template>

<script>
import {mapGetters} from "vuex"

export default {
    name: "Navigation",
    data() {
        return {
            links: [
                {
                    name: "Wating list",
                    path: '/waiting-list'
                },
                {
                    name: 'In progress',
                    path: '/in-progress',
                },
                {
                    name: 'Confirmed',
                    path: '/confirmed',
                },
                {
                    name: 'Others',
                    path: '/others',
                }
            ]
        }
    },
    computed: {
        ...mapGetters(['GET_CURRENT_USER']),
        currentUser() {
            return this.GET_CURRENT_USER
        }
    }
}
</script>
