import {createRouter, createWebHistory} from 'vue-router'
import Login from "../components/pages/Login"
import Home from "../components/pages/Home"
import WaitingList from "../components/pages/WaitingList"
import InProgress from "../components/pages/InProgress"
import Others from "../components/pages/Others"
import Confirmed from "../components/pages/Confirmed"

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
    {
        path: '/waiting-list',
        name: 'waiting-list',
        component: WaitingList,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/in-progress',
        name: 'in-progress',
        component: InProgress,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/confirmed',
        name: 'confirmed',
        component: Confirmed,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/others',
        name: 'others',
        component: Others,
        meta: {
            requiresAuth: true
        }
    }
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
