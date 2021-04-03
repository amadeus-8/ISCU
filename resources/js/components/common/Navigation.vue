<template>
    <div class="mt-3 custom-nav">
        <div v-for="(link, index) in links"
             :key="index">
            <router-link :to="link.path"
                         class="custom-link">{{link.name}}</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "Navigation",
    data() {
        return {
            links: [
                {
                    name: "Wating list",
                    path: '/waiting-list'
                },
                {
                    name: 'In progress',
                    path: '/in-progress',
                },
                {
                    name: 'Confirmed',
                    path: '/confirmed',
                },
                {
                    name: 'Others',
                    path: '/others',
                }
            ]
        }
    }
}
</script>

<style scoped>

</style>
