import axios from "axios"

const prodURL = ''
const devURL = 'http://127.0.0.1:8000/api'
const baseURL = process.env.NODE_ENV === 'production' ? prodURL : devURL

const user = localStorage.getItem('user')
const token = JSON.parse(user).token

const axiosInstance = axios.create({
    baseURL: baseURL,
    headers: {
        'Authorization': `Bearer ${token}`
    }
})

export const adviserAPI = {
    getTeachers() {
        return axiosInstance.get('/teachers')
    },
}

export const studentAPI = {

}
