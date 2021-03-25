export function login(credentials) {
    return new Promise((resolve, reject) => {
        axios.post('/api/auth/login', credentials)
            .then(response => {
                resolve(response.data)
            })
            .catch(error => {
                reject("Неверрное имя пользователя или пароль")
            })
    })
}

export function getLocalUser() {
    const user = localStorage.getItem('user')

    if(!user) return null

    return JSON.parse(user)
}
