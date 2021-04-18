<template>
    <div>
        <div class="board">
            <h4 class="mb-3">Доска</h4>
            <div class="d-flex justify-content-between">
                <div>
                    <div class="btn-group">
                        <button type="button"
                                class="btn btn-primary"
                                @click="viewType = 'plan'">План</button>
                        <button type="button"
                                class="btn btn-primary"
                                @click="viewType = 'courses'">Курсы</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4">
            <StudentCoursesList v-if="viewType === 'plan'" />
            <StudentPlan v-if="viewType === 'plan'" />
            <Courses v-if="viewType === 'courses'" />
        </div>
    </div>
</template>

<script>
import Courses from "../common/Courses"
import StudentPlan from "./StudentPlan"
import StudentCoursesList from "./StudentCoursesList";

export default {
    name: "StudentBoard",
    data() {
        return {
            viewType: 'plan'
        }
    },
    components: {
        StudentCoursesList,
        StudentPlan,
        Courses
    }
}
</script>

<style scoped>

</style>
