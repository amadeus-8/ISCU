<template>
    <div class="border">
        <div class="card-header">Данные учителя</div>
        <div class="card-body">
            <div class="input-group mb-3">
                <span class="input-group-text">Логин</span>
                <input type="text"
                       class="form-control"
                       v-model="teacher.login">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Имя</span>
                <input type="text"
                       class="form-control"
                       v-model="teacher.firstname">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Фамилия</span>
                <input type="text"
                       class="form-control"
                       v-model="teacher.lastname">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">ИИН</span>
                <input type="text"
                       class="form-control"
                       v-model="teacher.iin">
            </div>
        </div>
        <div class="d-flex justify-content-end card-footer">
            <button @click="createTeacher(teacher)"
                    class="btn btn-success">Сохранить</button>
        </div>
    </div>
</template>

<script>
import {mapActions} from "vuex"

export default {
    name: "CreteTeacher",
    data() {
        return {
            teacher: {
                login: '',
                firstname: '',
                lastname: '',
                iin: ''
            }
        }
    },
    methods: {
        ...mapActions(['createTeacher'])
    }
}
</script>
