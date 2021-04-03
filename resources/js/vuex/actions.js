import {adviserAPI} from "../api/api";

export const getTeachers = ({commit}) => {
    adviserAPI.getTeachers().then(response => {
        commit('SET_TEACHERS', response.data)
    })
}
