<template>
    <div class="card h-100 p-3">
        <StudentList :type="'pending'" />
    </div>
</template>

<script>
    import StudentList from "../adviser/StudentList";
    export default {
        name: "InProgress",
        components: {StudentList}
    }
</script>
