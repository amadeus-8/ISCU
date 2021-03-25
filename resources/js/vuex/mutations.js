export const LOGIN = (state) => {
    state.isLoading = true
    state.error = null
}

export const LOGIN_SUCCESS = (state, payload) => {
    state.error = null
    state.isLoggedIn = true
    state.isLoading = false
    state.currentUser = Object.assign({}, payload.user, {token: payload.access_token})
    localStorage.setItem('user', JSON.stringify(state.currentUser))
}

export const LOGIN_FAILED = (state, payload) => {
    state.error = payload
    state.isLoading = false
}

export const LOGOUT = (state) => {
    localStorage.removeItem('user')
    state.isLoggedIn = false
    state.currentUser = null
}
