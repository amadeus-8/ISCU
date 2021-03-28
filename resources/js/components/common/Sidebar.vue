<template>
    <div class="card h-100 p-3">
        <User />
        <Navigation />
    </div>
</template>

<script>
import User from './User'
import Navigation from "./Navigation"

export default {
    name: "Sidebar",
    components: {
        Navigation,
        User
    }
}
</script>

<style scoped>

</style>
