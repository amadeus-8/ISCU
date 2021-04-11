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

export const SET_TEACHERS = (state, payload) => {
    state.teachers = payload
}

export const SET_COURSES = (state, payload) => {
    state.courses = payload
}

export const SET_IS_LOADING = (state, payload) => {
    state.isLoading = payload
}
