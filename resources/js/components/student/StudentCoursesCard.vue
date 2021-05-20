<template>
    <div class="card-1">
                <div class="d-flex justify-content-end w-100">
                    <span class="times"
                          type="button"
                          data-bs-toggle="modal"
                          data-bs-target="#confirmModal">&times;</span>
                </div>
        <div>
            <div>
                <span class="d-inline-block p-2">ФИО учителя:</span>
                <span class="d-inline-block p-2">{{studentCourse.teacher_name}}</span>

            </div>
            <div>
                <span class="d-inline-block p-2">Название курса:</span>
                <span class="d-inline-block p-2">{{studentCourse.course_name}}</span>
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
        <Modal :courseId="studentCourse.id" />
    </div>
</template>

<script>
import Modal from "../common/Modal";
export default {
    name: "StudentCoursesCard",
    components: {Modal},
    props: {
        studentCourse: Object
    }
}
</script>

<style scoped>
    .times {
        font-size: 1.5rem;
        cursor: pointer;
    }
</style>
