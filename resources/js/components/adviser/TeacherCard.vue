<template>
    <div class="card-1">
        <!--        <div class="d-flex justify-content-end w-100">-->
        <!--            X-->
        <!--        </div>-->
        <div>
            <div>
                <span class="d-inline-block p-2">ФИО:</span>
                <span class="d-inline-block p-2">{{teacher.first_name}}</span>
                <span class="d-inline-block p-2">{{teacher.last_name}}</span>
            </div>
            <div>
                <span class="d-inline-block p-2">Степень:</span>
                <span class="d-inline-block p-2">Phd</span>
            </div>
            <div>
                <span class="d-inline-block p-2">Кафедра:</span>
                <span class="d-inline-block p-2">МКМ</span>
            </div>
            <div>
                <span class="d-inline-block p-2">Количество студентов:</span>
                <span class="d-inline-block p-2">100</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TeacherCard",
    props: {
        teacher: Object
    }
}
</script>

<style scoped>

</style>
