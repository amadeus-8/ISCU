<template>
    <div class="card h-100">
        <AdviserBoard v-if="currentUser.role === 'ADVISER'" />
        <StudentBoard v-if="currentUser.role === 'STUDENT'" />
    </div>
</template>

<script>
    import AdviserBoard from "../adviser/AdviserBoard"
    import StudentBoard from "../student/StudentBoard"
    import {mapGetters} from "vuex";
    export default {
        name: "Home",
        components: {StudentBoard, AdviserBoard},
        computed: {
            ...mapGetters(['GET_CURRENT_USER']),
            currentUser() {
                return this.GET_CURRENT_USER
            }
        },
    }
</script>
