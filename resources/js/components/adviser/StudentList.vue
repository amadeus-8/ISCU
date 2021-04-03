<template>
    <div class="grid">
        <StudentCard v-for="user in testArray" :user="user"/>
    </div>
</template>

<script>
import StudentCard from "./StudentCard"

export default {
    name: "StudentList",

    data() {
        return {
            testArray: []
        }
    },
    mounted() {
        this.test()
    },
    methods: {
        test() {
            axios.get('https://jsonplaceholder.typicode.com/todos?_limit=10')
                .then(response => {
                    this.setTest(response.data)
                })
        },
        setTest(response) {
            this.testArray = response
        }
    },
    components: {
        StudentCard
    },
}
</script>

<style scoped>
    .grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 1.5rem;
    }
</style>
