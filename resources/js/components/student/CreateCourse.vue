<template>
    <div>
        <div class="mt-3">
            <select class="form-select"
                    v-model="course.course_id">
                <option v-for="(course, index) in courses"
                        :key="index"
                        :value="course.id">{{ course.name }}</option>
            </select>
        </div>
        <div class="mt-3">
            <select class="form-select"
                    v-model="course.teacher_id">
                <option v-for="(teacher, index) in teachers"
                        :key="index"
                        :value="teacher.id">{{ teacher.first_name + ' ' + teacher.last_name }}</option>
            </select>
        </div>
        <div v-for="(course, index) in courses"
             :key="index"
             v-if="course.id == course.course_id">
            <span>Количество кредитов: {{ course.credits }}</span>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex"

    export default {
        name: "CreateCourse",
        data() {
            return {
                course: {
                    user_id: '',
                    course_id: '',
                    teacher_id: '',
                }
            }
        },
        computed: {
            ...mapGetters(['GET_TEACHERS', 'GET_COURSES']),
            teachers() {
                return this.GET_TEACHERS
            },
            courses() {
                return this.GET_COURSES
            }
        },
        methods: {
            ...mapActions(['getTeachers', 'getCourses', 'getTeachersById'])
        },
        watch: {
            'course.course_id': function () {
                this.getTeachersById(this.course.course_id)
            }
        },
        created() {
            // if(!this.teachers.length) {
            //     this.getTeachers()
            // }
            if(!this.courses.length) {
                this.getCourses()
            }
        }
    }
</script>
