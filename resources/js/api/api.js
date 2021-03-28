axios.default.headers.common['Authorization'] = `Bearer ${store.getters.currentUser.token}`

const baseURL = '';

axiosInstance = axios.create({
    baseURL: baseURL,
})
