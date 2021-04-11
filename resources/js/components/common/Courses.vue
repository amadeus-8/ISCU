<template>
    <div>
        <div>
            <select class="form-select" v-model="activeCourse">
                <option v-for="(course, index) in courses"
                        :key="index"
                        :value="course.id">{{course.name}}</option>
            </select>
        </div>
        <div class="">
            <div class=""
                 v-for="(course, index) in courses"
                 :key="index">
                <div class="custom-card"
                     v-if="course.id === activeCourse">
                    <div class="d-flex justify-content-center mb-3">
                        <h4>{{ course.name }}</h4>
                    </div>
                    <div>
                        <div class="d-flex justify-content-center w-100">
                            <div class="me-3 ms-3">
                                <div>Credits</div>
                                <div class="text-center">{{ course.credits }}</div>
                            </div>
<!--                            <div class="me-3 ms-3">-->
<!--                                <div>Semestr</div>-->
<!--                                <div class="text-center">7</div>-->
<!--                            </div>-->
                            <div class="me-3 ms-3">
                                <div>Department</div>
                                <div class="text-center">{{ course.department }}</div>
                            </div>
<!--                            <div class="me-3 ms-3">-->
<!--                                <div>Subject category</div>-->
<!--                                <div class="text-center">M</div>-->
<!--                            </div>-->
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="me-3 ms-3">
                                <div>Lectures</div>
                                <div class="text-center">{{ course.lection }}</div>
                            </div>
                            <div class="me-3 ms-3">
                                <div>Lab classes</div>
                                <div class="text-center">{{ course.lab }}</div>
                            </div>
                            <div class="me-3 ms-3">
                                <div>Practice classes</div>
                                <div class="text-center">{{ course.practice }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-for="(course, index) in courses"
             :key="index">
            <div class="general-info"
                 v-if="course.id === activeCourse">
                <h4>Описание курса</h4>
                <div>{{ course.description }}</div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'

    export default {
        name: "Courses",
        data() {
            return {
                activeCourse: 1
            }
        },
        created() {
            if(this.courses.length) {
                return
            }
            else {
                this.getCourses()
            }
        },
        computed: {
            ...mapGetters(['GET_COURSES']),
            courses() {
                return this.GET_COURSES
            }
        },
        methods: {
            ...mapActions(['getCourses'])
        }
    }
</script>

<style scoped>
    .grid {
        display: grid;
        margin-top: 1rem;
        grid-template-columns: repeat(2, 1fr);
        /*grid-gap: 1.5rem;*/
    }

    .custom-card {
        padding: 1.5rem;
        margin-top: 1rem;
        background: #e2e3e5;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .general-info {
        padding: 1rem;
        margin-top: 1rem;
        background: #e2e3e5;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
