<template>
    <div class="card-1">
<!--        <div class="d-flex justify-content-end w-100">-->
<!--            X-->
<!--        </div>-->
        <div>
            <div>
                <span class="d-inline-block p-2">Название предмета:</span>
                <span class="d-inline-block p-2">Physics</span>
            </div>
            <div>
                <span class="d-inline-block p-2">Количество кредитов</span>
                <span class="d-inline-block p-2">2</span>
            </div>
            <div>
                <span class="d-inline-block p-2">Преподаватель:</span>
                <span class="d-inline-block p-2"></span>
            </div>
            <div>
                <span class="d-inline-block p-2">Уровень:</span>
                <span class="d-inline-block p-2"></span>
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
        user: Object
    }
}
</script>

<style scoped>

</style>
