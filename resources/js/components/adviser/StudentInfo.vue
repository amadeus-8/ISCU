<template>
    <div class="card h-100 p-3">
        <div class="mb-3">
            <h4>{{ student.firstname + " " + student.lastname }}</h4>
        </div>
        <div class="mb-3 d-flex w-100 justify-content-between align-items-center">
            <div>
                Общее количество кредитов: {{ student.total_credits }}
            </div>
            <div>
                <button @click="downloadPDF({ type: $route.name.substring(0, $route.name.search('-')), id: $route.params['id'] })"
                        class="btn btn-primary">Скачать pdf</button>
            </div>
        </div>
        <div class="grid">
            <StudentCourses v-for="(course, index) in student.courses"
                            :course="course"
                            :key="index"/>
        </div>
        <div class="d-flex mt-3 justify-content-end w-100"
             v-if="$route.name === 'waiting-student'">
            <button class="btn btn-success"
                    @click="confirmCourses(selectedCourses)"
                    v-if="selectedCourses.length > 0">Подтвердить</button>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import StudentCourses from "./StudentCourses";

export default {
    name: "StudentInfo",
    components: {StudentCourses},
    data() {
        return {
            downloadPdfUri: '/student-courses/pdf' + this.$route.fullPath,
            selectedCourses: [],
        }
    },
    mounted() {
        this.getStudentInfo({ type: this.$route.name.substring(0, this.$route.name.search('-')), id: this.$route.params['id'] })
    },
    computed: {
        ...mapGetters(['GET_STUDENT_INFO']),
        student() {
            return this.GET_STUDENT_INFO
        },
    },
    methods: {
        ...mapActions(['getStudentInfo','downloadPDF', 'confirmCourses']),
        selectCourse(id) {
            if(this.$route.name !== 'waiting-student') {
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
