<template>
    <div>
        <div class="mb-4">
            <select class="form-select" v-model="status">
                <option :value="'pending'" selected>Сохраненные</option>
                <option :value="'waiting'">В ожидании</option>
                <option :value="'confirmed'">Подтвержденные</option>
            </select>
        </div>
        <div class="grid">
            <StudentCoursesCard v-for="(studentCourse, index) in studentCourses"
                                :studentCourse="studentCourse"
                                :key="index"/>
        </div>
        <div class="d-flex justify-content-end w-100"
             v-if="status !== 'waiting' && status !== 'confirmed'">
            <button class="btn btn-success"
                    @click="submitCourses(selectedCourses)"
                    v-if="selectedCourses.length > 0">Отправить на подтверждение</button>
        </div>
    </div>
</template>

<script>
    import StudentCoursesCard from "./StudentCoursesCard"
    import {mapActions, mapGetters} from "vuex"
    export default {
        name: "StudentCoursesList",
        data() {
            return {
                selectedCourses: [],
                status: 'pending',
            }
        },
        created() {
            if(!this.studentCourses.length) {
                this.getStudentCourses({ id: JSON.parse(localStorage.getItem('user'))['id'], status: 'pending' })
            }
        },
        methods: {
            ...mapActions(['getStudentCourses', 'submitCourses']),
            selectCourse(id) {
                if(this.status === 'waiting' || this.status === 'confirmed') {
                    return
                }
                if(!this.selectedCourses.includes(id)) {
                    this.selectedCourses.push(id)
                }
                else {
                    let index = this.selectedCourses.indexOf(id)
                    this.selectedCourses.splice(index, 1)
                }
            }
        },
        computed: {
            ...mapGetters(['GET_STUDENT_COURSES']),
            studentCourses() {
                return this.GET_STUDENT_COURSES
            }
        },
        watch: {
            'status': function () {
                this.getStudentCourses({ id: JSON.parse(localStorage.getItem('user'))['id'], status: this.status })
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
