<template>
    <div>
        <div class="board">
            <h4 class="mb-3">Доска</h4>
            <div class="d-flex justify-content-between">
                <div>
                    <div class="btn-group">
                        <button type="button"
                                class="btn btn-primary"
                                @click="viewType = 'teachers'">Учителя</button>
                        <button type="button"
                                class="btn btn-primary"
                                @click="viewType = 'courses'">Курсы</button>
                    </div>
                </div>
                <div>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle"
                                type="button"
                                id="dropdown-1"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">Добавить</button>
                        <ul class="dropdown-menu" aria-labelledby="dropdown-1">
                            <li><span class="dropdown-item">Учителя</span></li>
                            <li><span class="dropdown-item">Курс</span></li>
                            <li><span class="dropdown-item">Студента</span></li>
                            <li><span class="dropdown-item">Родителя</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-4">
        <TeachersList v-if="viewType === 'teachers'" />
        <Courses v-if="viewType === 'courses'" />
    </div>
</template>

<script>
    import TeachersList from "./TeachersList"
    import Courses from "./Courses"

    export default {
        name: "AdviserBoard",
        data() {
            return {
                viewType: 'teachers'
            }
        },
        components: {
            Courses,
            TeachersList
        }
    }
</script>
