<template>
    <div>
        <div>
            Общее количество кредитов: {{ credits }}
        </div>
        <div>
            Допустимое количество кредитов: 30
        </div>
        <div class="d-flex justify-content-center w-100">
            <button class="btn btn-warning"
                    :disabled="credits > 25"
                    @click="createCourse = !createCourse">Добавить курс</button>
        </div>
        <CreateCourse v-if="createCourse" />
    </div>
</template>

<script>
import CreateCourse from "../student/CreateCourse"
import {mapGetters} from "vuex";
export default {
    name: "StudentPlan",
    data() {
        return {
            createCourse: false
        }
    },
    computed: {
        ...mapGetters(['GET_TOTAL_CREDITS']),
        credits() {
            return this.GET_TOTAL_CREDITS
        }
    },
    components: {CreateCourse}
}
</script>

<style scoped>

</style>
