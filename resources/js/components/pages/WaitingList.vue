<template>
    <div class="card h-100 p-3">
        <StudentList :type="'waiting'" />
    </div>
</template>

<script>
    import StudentList from "../adviser/StudentList";
    export default {
        name: "WaitingList",
        mounted() {
            console.log(this.$route)
        },
        components: {StudentList}
    }
</script>
