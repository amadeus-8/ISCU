<template>
    <div class="login row">
        <div class="ccl-12 col-sm-10 col-md-4">
            <div class="card">
                <div class="card-body">
                    <form @submit="authenticate">
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
                        <div v-if="errorMessage">
                            <p>{{errorMessage}}</p>
                        </div>
                        <button type="submit"
                                @click="authenticate"
                                class="btn btn-primary w-100">Войти</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // import {login} from "../../helpers/auth"
    import {mapActions, mapGetters, mapMutations} from 'vuex'

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
            ...mapActions(['login']),
            isCredentialsEmpty() {
                let loginAndPassIsEmpty = this.credentials.login === '' && this.credentials.password === ''
                let loginOrPassIsEmpty = this.credentials.login === '' || this.credentials.password === ''
                return loginAndPassIsEmpty || loginOrPassIsEmpty
            },
            authenticate() {

                if(this.isCredentialsEmpty()) return

                // this.LOGIN()

                this.login(this.credentials)


                // login(this.credentials)
                //     .then(response => {
                //         this.LOGIN_SUCCESS(response)
                //         this.$router.push({name: 'home'})
                //     })
                //     .catch(error => {
                //         this.LOGIN_FAILED(error)
                //     })
            }
        },
        updated() {

        },
        computed: {
            ...mapGetters(['GET_ERROR']),
            errorMessage() {
                return this.GET_ERROR
            }
        }
    }
</script>
