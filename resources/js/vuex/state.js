import {getLocalUser} from "../helpers/auth";

const user = getLocalUser()

export default {
    currentUser: user,
    isLoggedIn: !!user,
    isLoading: false,
    isError: false,
    error: null,
    success: null,
    flashIsVisible: false,
    teachers: [],
    courses: [],
    student_courses: [],
    pending_students: [],
    confirmed_students: [],
    waiting_students: [],
    other_students: [],
    studentInfo: {},
    total_credits: 0,
}
