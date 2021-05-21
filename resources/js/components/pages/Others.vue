<template>
    <div class="card h-100 p-3">
        <StudentList :type="'others'" />
    </div>
</template>

<script>
    import StudentList from "../adviser/StudentList";
    export default {
        name: "Others",
        components: {StudentList}
    }
</script>
