import {adviserAPI} from "../api/api";
import {comment} from "postcss";

export const getTeachers = ({commit}) => {
    adviserAPI.getTeachers().then(response => {
        commit('SET_TEACHERS', response.data)
    })
}

export const getCourses = ({commit}) => {
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
    adviserAPI.createCourse(course).then((response) => {
        alert(response.data.success)
    })
}

export const getTeachersById = ({commit}, id) => {
    adviserAPI.getTeachersById(id).then(response => {
        commit('SET_TEACHERS', response.data)
    })
}
