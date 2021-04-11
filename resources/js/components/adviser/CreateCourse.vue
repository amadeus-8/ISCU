<template>
    <div class="border">
        <div class="card-header">Создать курс</div>
        <div class="card-body">
            <div class="input-group mb-3">
                <span class="input-group-text">Наименование курса</span>
                <input type="text"
                       class="form-control"
                       v-model="course.title">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Преподаватель</span>
                <input type="text"
                       class="form-control"
                       v-model="course.teacher">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Кредиты</span>
                <input type="number"
                       class="form-control"
                       v-model="course.credits">
            </div>
        </div>
        <div class="d-flex justify-content-end card-footer">
            <button @click="createCourse(course)"
                    class="btn btn-success">Сохранить</button>
        </div>
    </div>
</template>

<script>
import {mapActions} from "vuex";

export default {
    name: "CreateCourse",
    data() {
        return {
            course: {
                title: '',
                teacher: '',
                credits: 0,
            }
        }
    },
    methods: {
        ...mapActions(['createCourse'])
    }
}
</script>

<style scoped>

</style>
