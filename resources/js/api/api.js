import axios from "axios"

const prodURL = ''
const devURL = 'http://127.0.0.1:8000/api'
const baseURL = process.env.NODE_ENV === 'production' ? prodURL : devURL

// const user = localStorage.getItem('user')
// const token = JSON.parse(user).token

const initialize = () => {
    const user = localStorage.getItem('user')

    if(user !== null && user !== '') {
        const token = JSON.parse(user).token
        return setAuthorization(token)
    }
}

const setAuthorization = token => {
    return {
        'Authorization': `Bearer ${token}`
    }
}


const axiosInstance = axios.create({
    baseURL: baseURL,
    // headers: {
    //     'Authorization': `Bearer ${token}`
    // },
    headers: initialize()
})

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
    }
}

export const studentAPI = {
    createCourse({course, type}) {
        return axiosInstance.post('/student/course/create',{course, type})
    }
}
