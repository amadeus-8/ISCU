import axios from "axios"

const prodURL = ''
const devURL = 'http://127.0.0.1:8000/api'
const baseURL = process.env.NODE_ENV === 'production' ? prodURL : devURL

const axiosInstance = axios.create({
    baseURL,
})

axiosInstance.interceptors.request.use(
    async (config) => {

        const user = localStorage.getItem('user')
        const currentUser = JSON.parse(user)
        const token = currentUser.token

        config.headers.Authorization = `Bearer ${token}`

        return config
    },
    (error) => {
        return Promise.reject(error)
    }
)

axiosInstance.interceptors.response.use(
    response => response,
    error => {
        if(error.response.status === 401) {
            localStorage.removeItem('user')
            this.$router.push({name: 'login'})
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
    }
}

export const studentAPI = {
    createCourse({course, type}) {
        return axiosInstance.post('/student/course/create', {course, type})
    },
    getStudentCourses(id) {
        return axiosInstance.get(`/student/courses/${id}`)
    }
}
