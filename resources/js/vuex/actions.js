import {adviserAPI, authAPI, studentAPI} from "../api/api"

export const login = ({ commit }, credentials) => {
    console.log('inside login action')
    authAPI.login(credentials).then(response => {
        console.log('inside login promise')
        commit('SET_USER', response.data)
    })
}

export const getTeachers = ({ commit }) => {
    adviserAPI.getTeachers().then(response => {
        commit('SET_TEACHERS', response.data)
    })
}

export const getCourses = ({ commit }) => {
    adviserAPI.getCourses().then(response => {
        commit('SET_COURSES', response.data)
    })
}

export const createStudent = ({}, student) => {
    adviserAPI.createStudent(student).then((response) => {
        alert(response.data.success)
    })
}

export const createTeacher = ({}, teacher) => {
    adviserAPI.createTeacher(teacher).then((response) => {
        alert(response.data.success)
    })
}

export const createCourse = ({}, course) => {
    adviserAPI.createCourse(course, type).then((response) => {
        alert(response.data.success)
    })
}

export const getTeachersById = ({ commit }, id) => {
    adviserAPI.getTeachersById(id).then(response => {
        commit('SET_TEACHERS', response.data)
    })
}

export const createStudentCourse = ({}, { course, type }) => {
    studentAPI.createCourse({ course, type }).then(response => {
        location.reload()
    })
}

export const getStudentCourses = ({commit}, id) => {
    studentAPI.getStudentCourses(id).then(response => {
        commit('SET_STUDENT_COURSES', response.data)
    })
}

export const getStudentsList = ({commit}, type) => {
    adviserAPI.getStudentsList(type).then((response) => {
        switch (type) {
            case "pending":
                commit('SET_PENDING_STUDENTS', response.data)
                break
            case "confirmed":
                commit('SET_CONFIRMED_STUDENTS', response.data)
                break
            case "waiting":
                commit('SET_WAITING_STUDENTS', response.data)
                break
            default:
                break
        }
    })
}
