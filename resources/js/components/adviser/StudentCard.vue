<template>
    <div class="card-1"
         @click="openStudentCard(student.id)">
        <div>
            <div>
                <span class="d-inline-block p-2">ФИО студента:</span>
                <span class="d-inline-block p-2">{{ student.firstname + " " + student.lastname }}</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "StudentCard",
    props: {
        student: Object
    },
    methods: {
        openStudentCard(id) {
            this.$router.push({ name: this.$route.path.substr(1, this.$route.path.length) + '-student', params: { id: id }})
        }
    }
}
</script>
