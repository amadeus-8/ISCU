<template>
    <div class="card h-100 p-3">
      <StudentList :type="'confirmed'" />
    </div>
</template>

<script>
    import StudentList from "../adviser/StudentList";
    export default {
      name: "Confirmed",
      components: {StudentList}
    }
</script>
