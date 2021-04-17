import {getLocalUser} from "../helpers/auth";

const user = getLocalUser()

export default {
    currentUser: user,
    isLoggedIn: !!user,
    isLoading: false,
    error: null,
    teachers: [],
    courses: [],
    student_courses: [],
}
