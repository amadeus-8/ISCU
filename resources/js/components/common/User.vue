<template>
    <div class="user-container">
        <div class="d-flex align-items-center">
            <div class="user-image-container">
                <img src="../../../assets/images/user-logo.png"
                     class="user-image"
                     alt="user-logo">
            </div>
            <div class="user-info">
                <p class="p-0 m-0">
                    <span class="user-info__title">{{ currentUser.firstname }}</span>
                    <span class="user-info__title">{{ currentUser.lastname }}</span>
                </p>
                <p class="p-0 m-0" v-if="currentUser.course">{{ currentUser.course }} курс</p>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex'

export default {
    name: "User",
    computed: {
        ...mapGetters(['GET_CURRENT_USER']),
        currentUser() {
            return this.GET_CURRENT_USER
        }
    }
}
</script>

<style scoped>

</style>
