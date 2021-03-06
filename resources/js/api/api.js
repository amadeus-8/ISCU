import axios from "axios"
import store from '../vuex/store'
import router from '../routes/router'

const prodURL = 'https://iitu-iscu.herokuapp.com/api'
const devURL = 'http://127.0.0.1:8000/api'
const baseURL = process.env.NODE_ENV === 'production' ? prodURL : devURL

console.log(baseURL)

const axiosInstance = axios.create({
    baseURL,
})

axiosInstance.interceptors.request.use(
    (config) => {
        store.commit('SET_LOADING', true)

        if (!config.url.includes('login')) {
            const user = localStorage.getItem('user')
            const currentUser = JSON.parse(user)
            const token = currentUser.token

            config.headers.Authorization = `Bearer ${token}`

            return config
        }
        return config
    },
    (error) => {
        return Promise.reject(error)
    }
)

axiosInstance.interceptors.response.use(
    (config) => {
        store.commit('SET_LOADING', false)

        // if (config.request.responseURL.includes('login')) {
        //     router.push({name: 'home'})
        //     return config
        // }

        return config;
    },
    (error) => {
        if (error.response.status === 401) {
            localStorage.removeItem('user')
            router.replace({name: 'login'})
        }
    })

export const authAPI = {
    login(credentials) {
        return axiosInstance.post('/auth/login', credentials)
    },
    logout() {
        return axiosInstance.post('/auth/logout', {})
    },
    refreshToken() {
        return axiosInstance.post('/auth/refresh', {})
    },
}

export const adviserAPI = {
    getTeachers() {
        return axiosInstance.get('/teachers')
    },
    getTeachersById(id) {
        return axiosInstance.get(`/teachers/${id}`)
    },
    getCourses() {
        return axiosInstance.get('/courses')
    },
    createStudent(student) {
        return axiosInstance.post('/student/create', student)
    },
    createTeacher(teacher) {
        return axiosInstance.post('/teacher/create', teacher)
    },
    createCourse(course) {
        return axiosInstance.post('/adviser/course/create', course)
    },
    getStudentsList(type) {
        return axiosInstance.get(`/students/${type}`)
    },
    getStudentInfo({ type, id }) {
        return axiosInstance.get(`/students/${type}/${id}`)
    },
    downloadPDF({ type, id}) {
        return axiosInstance.get(`/student-courses/pdf/${type}/${id}`, {responseType: 'arraybuffer'})
    },
    confirmCourses(courses) {
        return axiosInstance.post('/adviser/courses/confirm', {courses})
    },
    deleteTeacher(id) {
        return axiosInstance.post('/adviser/teacher/delete', {id})
    },
    deleteAdviserCourse(id) {
        return axiosInstance.post('/adviser/course/delete', {id})
    }
}

export const studentAPI = {
    createCourse(course) {
        return axiosInstance.post('/student/course/create', course)
    },
    submitCourses(courses) {
        return axiosInstance.post('/student/course/submit', {courses})
    },
    getStudentCourses({ id, status }) {
        return axiosInstance.get(`/student/courses/${id}/${status}`)
    },
    deleteCourse(id) {
        return axiosInstance.post(`/student/course/delete`, {id})
    }
}
