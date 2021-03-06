export const GET_IS_LOADING = (state) => {
    return state.isLoading
}

export const GET_IS_LOGGED_IN = (state) => {
    return state.isLoggedIn
}

export const GET_CURRENT_USER = (state) => {
    return state.currentUser
}

export const GET_ERROR = (state) => {
    return state.error
}

export const GET_SUCCESS = (state) => {
    return state.success
}

export const GET_FLASH_ISVISIBLE = (state) => {
    return state.flashIsVisible
}

export const GET_ISERROR = (state) => {
    return state.isError
}

export const GET_TEACHERS = (state) => {
    return state.teachers
}

export const GET_COURSES = (state) => {
    return state.courses
}

export const GET_STUDENT_COURSES = (state) => {
    return state.student_courses
}

export const GET_PENDING_STUDENTS = (state) => {
    return state.pending_students
}

export const GET_CONFIRMED_STUDENTS = (state) => {
    return state.confirmed_students
}

export const GET_WAITING_STUDENTS = (state) => {
    return state.waiting_students
}

export const GET_OTHER_STUDENTS = (state) => {
    return state.other_students
}

export const GET_STUDENT_INFO = (state) => {
    return state.studentInfo
}

export const GET_TOTAL_CREDITS = (state) => {
    return state.total_credits
}
