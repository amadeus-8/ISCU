<template>
    <div class="card-1">
<!--        <div class="d-flex justify-content-end w-100">-->
<!--            X-->
<!--        </div>-->
        <div>
            <div>
                <span class="d-inline-block p-2">Название предмета:</span>
                <span class="d-inline-block p-2">{{ student.course }}</span>
            </div>
            <div>
                <span class="d-inline-block p-2">Количество кредитов</span>
                <span class="d-inline-block p-2">{{ student.credits }}</span>
            </div>
            <div>
                <span class="d-inline-block p-2">Преподаватель:</span>
                <span class="d-inline-block p-2">{{ student.teacher }}</span>
            </div>
            <div>
                <span class="d-inline-block p-2">Количество студентов:</span>
                <span class="d-inline-block p-2"></span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "StudentCard",
    props: {
        student: Object
    }
}
</script>
