<template>
    <div class="grid">
        <StudentCard v-for="student in students" :student="student"/>
    </div>
</template>

<script>
import StudentCard from "./StudentCard"
import {mapActions, mapGetters} from "vuex"

export default {
    name: "StudentList",
    props: {
        type: String
    },
    created() {
        if(!this.students.length) {
            this.getStudentsList(this.type)
        }
    },
    methods: {
        ...mapActions(['getStudentsList']),
    },
    computed: {
        ...mapGetters(['GET_PENDING_STUDENTS', 'GET_CONFIRMED_STUDENTS', 'GET_WAITING_STUDENTS', 'GET_OTHER_STUDENTS']),
        students() {
            switch (this.type) {
                case 'pending':
                    return this.GET_PENDING_STUDENTS
                case 'waiting':
                    return this.GET_WAITING_STUDENTS
                case 'confirmed':
                    return this.GET_CONFIRMED_STUDENTS
                case 'others':
                    return this.GET_OTHER_STUDENTS
                default:
                    break
            }
        }
    },
    components: {
        StudentCard
    },
}
</script>

<style scoped>
    .grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 1.5rem;
    }
</style>
