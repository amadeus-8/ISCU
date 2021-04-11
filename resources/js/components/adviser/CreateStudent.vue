<template>
    <div class="border">
        <div class="card-header">Данные студента</div>
        <div class="card-body">
            <div class="input-group mb-3">
                <span class="input-group-text">Логин</span>
                <input type="text"
                       class="form-control"
                       v-model="student.login">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Имя</span>
                <input type="text"
                       class="form-control"
                       v-model="student.firstname">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Фамилия</span>
                <input type="text"
                       class="form-control"
                       v-model="student.lastname">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">ИИН</span>
                <input type="text"
                       class="form-control"
                       v-model="student.iin">
            </div>
        </div>
        <div class="d-flex justify-content-end card-footer">
            <button @click="createStudent(student)"
                    class="btn btn-success">Сохранить</button>
        </div>
    </div>
</template>

<script>
import {mapActions} from "vuex"

export default {
    name: "CreateStudent",
    data() {
        return {
            student: {
                login: '',
                firstname: '',
                lastname: '',
                iin: ''
            }
        }
    },
    methods: {
        ...mapActions(['createStudent'])
    }
}
</script>
