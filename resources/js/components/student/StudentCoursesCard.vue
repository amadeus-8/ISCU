<template>
    <div class="card-1">
        <!--        <div class="d-flex justify-content-end w-100">-->
        <!--            X-->
        <!--        </div>-->
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
                <span class="d-inline-block p-2">100</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "StudentCoursesCard",
    props: {
        studentCourse: Object
    }
}
</script>

<style scoped>

</style>
