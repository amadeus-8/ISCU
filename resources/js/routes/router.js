import {createRouter, createWebHistory} from 'vue-router'
import Login from "../components/pages/Login"
import Home from "../components/pages/Home"

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth)
    const currentUser = store.state.currentUser

    if(requiresAuth && !currentUser) {
        return next('/login')
    }
    else if(to.path === '/login' && currentUser) {
        return next('/')
    }
    else {
        return next()
    }
})

export default router
