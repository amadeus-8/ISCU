<template>
    <div class="login row">
        <div class="ccl-12 col-sm-10 col-md-4">
            <div class="card">
                <div class="card-body">
                    <form @submit.prevent="authenticate">
                        <div class="mb-3">
                            <label for="login" class="form-label">Имя пользователя</label>
                            <input type="text"
                                   class="form-control"
                                   id="login"
                                   v-model="credentials.login">
                        </div>
                        <div class="mb-3">
                            <label for="password"
                                   class="form-label">Пароль</label>
                            <input type="password"
                                   class="form-control"
                                   id="password"
                                   v-model="credentials.password">
                        </div>
                        <button type="submit"
                                class="btn btn-primary w-100">Войти</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {login} from "../../helpers/auth"
    import {mapMutations} from 'vuex'

    export default {
        name: "Login",
        data() {
            return {
                credentials: {
                    login: '',
                    password: ''
                }
            }
        },
        methods: {
            ...mapMutations(['LOGIN', 'LOGIN_SUCCESS', 'LOGIN_FAILED']),
            authenticate() {
                this.LOGIN()

                login(this.credentials)
                    .then(response => {
                        this.LOGIN_SUCCESS(response)
                        this.$router.push({name: 'home'})
                    })
                    .catch(error => {
                        this.LOGIN_FAILED(error)
                    })
            }
        }
    }
</script>

<style scoped>

</style>
