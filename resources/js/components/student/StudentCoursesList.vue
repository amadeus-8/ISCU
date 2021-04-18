<template>
    <div class="grid">
        <StudentCoursesCard v-for="(studentCourse, index) in studentCourses"
                            :studentCourse="studentCourse"
                            :key="index"/>
    </div>
</template>

<script>
    import StudentCoursesCard from "./StudentCoursesCard"
    import {mapActions, mapGetters} from "vuex"
    export default {
        name: "StudentCoursesList",
        created() {
            if(!this.studentCourses.length) {
                this.getStudentCourses(JSON.parse(localStorage.getItem('user'))['id'])
            }
        },
        methods: {
            ...mapActions(['getStudentCourses']),
        },
        computed: {
            ...mapGetters(['GET_STUDENT_COURSES']),
            studentCourses() {
                return this.GET_STUDENT_COURSES
            }
        },
        components: {StudentCoursesCard}
    }
</script>

<style scoped>
    .grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 1.5rem;
        margin-bottom: 1rem;
    }
    @media(max-width: 780px) {
        .grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            grid-gap: 1.5rem;
        }
    }
</style>
