<template>
    <div>
        <div class="mt-3">
            <div>Название курса: </div>
            <select class="form-select"
                    v-model="course.course_id">
                <option v-for="(course, index) in courses"
                        :key="index"
                        :value="course.id">{{ course.name }}</option>
            </select>
        </div>
        <div class="mt-3"
             v-show="course.course_id">
            <div>Учитель: </div>
            <select class="form-select"
                    v-model="course.teacher_id">
                <option v-for="(teacher, index) in teachers"
                        :key="index"
                        :value="teacher.id">{{ teacher.first_name + ' ' + teacher.last_name }}</option>
            </select>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary me-2"
                    @click="createStudentCourse()">Сохранить</button>
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
                    user_id: JSON.parse(localStorage.getItem('user'))['id'],
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
            },
        },
        methods: {
            ...mapActions(['getTeachers', 'getCourses', 'getTeachersById', 'createStudentCourse'])
        },
        watch: {
            'course.course_id': function () {
                this.getTeachersById(this.course.course_id)
            }
        },
        created() {
            if(!this.courses.length) {
                this.getCourses()
            }
        }
    }
</script>
