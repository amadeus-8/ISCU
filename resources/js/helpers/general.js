export const initialize = (store) => {
    axios.interceptors.response.use(null, (error) => {
        if(error.response.status === '401') {
            store.commit('LOGOUT')
            this.$router.push({name: 'login'})
        }

        return Promise.reject(error)
    })

    if(store.getters.GET_CURRENT_USER) {
        setAuthorization(store.getters.GET_CURRENT_USER.token);
    }
}

export const setAuthorization = (token) => {
    axios.defaults.headers.common["Authorization"] = `Bearer ${token}`
}
