<template>
    <div class="card-1">
        <div class="d-flex justify-content-end w-100">
            <button class="times"
                    type="button"
                    data-bs-toggle="modal"
                    data-bs-target="#confirmModal">&times;</button>
        </div>
        <div>
            <div>
                <span class="d-inline-block p-2">ФИО:</span>
                <span class="d-inline-block p-2">{{teacher.first_name}}</span>
                <span class="d-inline-block p-2">{{teacher.last_name}}</span>
            </div>
            <div>
                <span class="d-inline-block p-2">Степень:</span>
                <span class="d-inline-block p-2">{{ teacher.academic_degree }}</span>
            </div>
<!--            <div>-->
<!--                <span class="d-inline-block p-2">Кафедра:</span>-->
<!--                <span class="d-inline-block p-2">МКМ</span>-->
<!--            </div>-->
            <div>
                <span class="d-inline-block p-2">Количество студентов:</span>
                <span class="d-inline-block p-2">{{ teacher.total_students }}</span>
            </div>
        </div>
        <Modal :id="teacher.id"
               :type="'teacher'" />
    </div>
</template>

<script>
import Modal from "../common/Modal";
export default {
    name: "TeacherCard",
    components: {Modal},
    props: {
        teacher: Object
    }
}
</script>

<style scoped>
.times {
    outline: none;
    border: none;
    background: none;
    color: #FFF;
    font-size: 1.5rem;
    cursor: pointer;
    transition: 0.4s ease;
}
.times:hover:enabled {
    color: red;
}
</style>
