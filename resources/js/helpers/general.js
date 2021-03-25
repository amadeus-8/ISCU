axios.interceptors.response.use(null, (error) => {
    if(error.response.status === '401') {
        store.commit('LOGOUT')
    }

    return Promise.reject(error)
})
