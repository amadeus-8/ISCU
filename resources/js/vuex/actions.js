import {adviserAPI, authAPI, studentAPI} from "../api/api"

export const login = ({ commit }, credentials) => {
    authAPI.login(credentials).then(response => {
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
        if(response.data.success) {
            alert("Успешно создано")
        }
        else {
            alert("Произошла ошибка при создании")
        }
        location.reload()
    })
}

export const createTeacher = ({}, teacher) => {
    adviserAPI.createTeacher(teacher).then((response) => {
        if(response.data.success) {
            alert("Успешно создано")
        }
        else {
            alert("Произошла ошибка при создании")
        }
        location.reload()
    })
}

export const createCourse = ({}, course) => {
    adviserAPI.createCourse(course, type).then((response) => {
        if(response.data.success) {
            alert("Успешно создано")
        }
        else {
            alert("Произошла ошибка при создании")
        }
        location.reload()
    })
}

export const getTeachersById = ({ commit }, id) => {
    adviserAPI.getTeachersById(id).then(response => {
        commit('SET_TEACHERS', response.data)
    })
}

export const createStudentCourse = ({}, course) => {
    studentAPI.createCourse(course).then(response => {
        location.reload()
    })
}

export const getStudentCourses = ({commit}, { id, status }) => {
    studentAPI.getStudentCourses({ id, status }).then(response => {
        commit('SET_STUDENT_COURSES', response.data.student_courses)
        commit('SET_TOTAL_CREDITS', response.data.total_credits)
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
            case "others":
                commit('SET_OTHER_STUDENTS', response.data)
                break
            default:
                break
        }
    })
}

export const getStudentInfo = ({ commit }, { type, id}) => {
    adviserAPI.getStudentInfo({ type, id }).then((response) => {
        commit('SET_STUDENT_INFO', response.data)
    })
}

export const downloadPDF = ({}, { type, id}) => {
    adviserAPI.downloadPDF({ type, id }).then((response) => {
        let blob = new Blob([response.data], { type: 'application/pdf' })
        let link = document.createElement('a')
        link.href = window.URL.createObjectURL(blob)
        link.download = 'Отчет по студенту.pdf'
        link.click()
    })
}

export const deleteCourse = ({ commit }, id) => {
    studentAPI.deleteCourse(id).then(response => {
        if(response.data.success) {
            location.reload()
        }
    })
}

export const submitCourses = ({}, courses) => {
    studentAPI.submitCourses(courses).then(response => {
        location.reload()
    })
}

export const confirmCourses = ({}, courses) => {
    adviserAPI.confirmCourses(courses).then(response => {
        location.reload()
    })
}
