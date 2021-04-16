<template>
    <div>
        <div class="d-flex justify-content-center w-100">
            <button class="btn btn-warning" @click="createCourse = !createCourse">Добавить курс</button>
        </div>
        <CreateCourse v-if="createCourse" />
    </div>
</template>

<script>
import CreateCourse from "../student/CreateCourse"
export default {
    name: "StudentPlan",
    data() {
        return {
            createCourse: false
        }
    },
    components: {CreateCourse}
}
</script>

<style scoped>

</style>
