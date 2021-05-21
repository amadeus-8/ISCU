<template>
    <div class="card-1 pointer"
         :class="$parent.selectedCourses.includes(studentCourse.id) ? 'selected' : '' "
         @click="$parent.selectCourse(studentCourse.id)">
        <div class="d-flex justify-content-end w-100"
             v-if="studentCourse.status !== 'waiting' && studentCourse.status !== 'confirmed'">
                    <button class="times"
                            type="button"
                            :disabled="$parent.selectedCourses.length > 0"
                            data-bs-toggle="modal"
                            data-bs-target="#confirmModal">&times;</button>
        </div>
        <div>
            <div>
                <span class="d-inline-block p-2">ФИО учителя:</span>
                <span class="d-inline-block p-2">{{ studentCourse.teacher_name }}</span>
            </div>
            <div>
                <span class="d-inline-block p-2">Название курса:</span>
                <span class="d-inline-block p-2">{{ studentCourse.course_name }}</span>
            </div>
            <div>
                <span class="d-inline-block p-2">Кол-во кредитов:</span>
                <span class="d-inline-block p-2">{{ studentCourse.credits }}</span>
            </div>
            <!--            <div>-->
            <!--                <span class="d-inline-block p-2">Кафедра:</span>-->
            <!--                <span class="d-inline-block p-2">МКМ</span>-->
            <!--            </div>-->
            <div>
                <span class="d-inline-block p-2">Количество студентов:</span>
                <span class="d-inline-block p-2">{{ studentCourse.total_students }}</span>
            </div>
        </div>
        <Modal :courseId="studentCourse.id"/>
    </div>
</template>

<script>
import Modal from "../common/Modal";

export default {
    name: "StudentCoursesCard",
    components: {Modal},
    props: {
        studentCourse: Object,
    },
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
.selected {
    background-color: #E5E6E7;
}
.pointer {
    cursor: pointer;
}
</style>
