<template>
    <div class="card h-100 p-3">
        <div class="mb-3">
            <h4>{{ student.firstname + " " + student.lastname }}</h4>
        </div>
        <div class="grid">
            <StudentCourses v-for="(course, index) in student.courses"
                            :course="course"
                            :key="index"/>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import StudentCourses from "./StudentCourses";

export default {
    name: "StudentInfo",
    components: {StudentCourses},
    mounted() {
        this.getStudentInfo({ type: this.$route.name.substring(0, this.$route.name.search('-')), id: this.$route.params['id'] })
    },
    computed: {
        ...mapGetters(['GET_STUDENT_INFO']),
        student() {
            return this.GET_STUDENT_INFO
        }
    },
    methods: {
        ...mapActions(['getStudentInfo'])
    }
}
</script>

<style scoped>
    .grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 1.5rem;
    }
</style>
