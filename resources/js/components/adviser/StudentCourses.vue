<template>
    <div class="card-1 pointer"
         :class="$parent.selectedCourses.includes(course.id) ? 'selected' : '' "
         @click="$parent.selectCourse(course.id)">
        <div>
            <span class="d-inline-block p-2">Название предмета:</span>
            <span class="d-inline-block p-2">{{ course.name }}</span>
        </div>
        <div>
            <span class="d-inline-block p-2">Количество кредитов</span>
            <span class="d-inline-block p-2">{{ course.credits }}</span>
        </div>
        <div>
            <span class="d-inline-block p-2">Преподаватель:</span>
            <span class="d-inline-block p-2">{{ course.teacher }}</span>
        </div>
        <div>
            <span class="d-inline-block p-2">Количество студентов:</span>
            <span class="d-inline-block p-2"></span>
        </div>
    </div>
</template>

<script>
export default {
    name: "StudentCourses",
    props: {
        course: Object
    }
}
</script>

<style scoped>
.selected {
  background-color: #E5E6E7;
}
.pointer {
  cursor: pointer;
}
</style>
