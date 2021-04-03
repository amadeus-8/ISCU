<template>
    <div class="grid">
        <TeacherCard v-for="teacher in teachers" :teacher="teacher"/>
    </div>
</template>

<script>
    import TeacherCard from "./TeacherCard"
    import {mapActions, mapGetters} from "vuex"

    export default {
        name: "TeachersList",
        data() {
            return {
                testArray: []
            }
        },
        created() {
            if(this.teachers.length) {
                return
            }
            else {
                this.getTeachers()
            }
        },
        methods: {
            ...mapActions(['getTeachers']),
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
        computed: {
            ...mapGetters(['GET_TEACHERS']),
            teachers() {
                return this.GET_TEACHERS
            }
        },
        components: {
            TeacherCard
        },
    }
</script>

<style scoped>
    .grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 1.5rem;
    }
    @media(max-width: 780px) {
        .grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            grid-gap: 1.5rem;
        }
    }
</style>
