const initialize = () => {
    axios.interceptors.response.use(null, (error) => {
        if(error.response.status === '401') {
            store.commit('LOGOUT')
            this.$router.push({name: 'login'})
        }

        return Promise.reject(error)
    })
}

export default initialize
