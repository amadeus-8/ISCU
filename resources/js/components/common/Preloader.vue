<template>
    <div v-if="isLoading">
        <div class="preloader-body">
            <div class="loader"></div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex'

export default {
    name: "Preloader",
    computed: {
        ...mapGetters(['GET_IS_LOADING']),
        isLoading() {
            return this.GET_IS_LOADING
        }
    }
}
</script>
