import router from "../routes/router";

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

export const SET_LOADING = (state, payload) => {
    state.isLoading = payload
}

export const SET_STUDENT_COURSES = (state, payload) => {
    state.student_courses = payload
}

export const SET_PENDING_STUDENTS = (state, payload) => {
    state.pending_students = payload
}

export const SET_WAITING_STUDENTS = (state, payload) => {
    state.waiting_students = payload
}

export const SET_CONFIRMED_STUDENTS = (state, payload) => {
    state.confirmed_students = payload
}

export const SET_USER = (state, payload) => {
    state.currentUser = Object.assign({}, payload.user, {token: payload.access_token})
    localStorage.setItem('user', JSON.stringify(state.currentUser))
}

export const SET_STUDENT_INFO = (state, payload) => {
    state.studentInfo = payload
}

export const SET_TOTAL_CREDITS = (state, payload) => {
    state.total_credits = payload
}
