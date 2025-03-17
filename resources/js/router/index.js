import { createRouter, createWebHashHistory } from 'vue-router'
import Home from '../components/views/Home.vue'
import Register from '../components/views/Register.vue'
import Login from '../components/views/Login.vue'
import Forum from '../components/views/Forum.vue'
import About from '../components/views/About.vue'
import AboutMe from '../components/views/AboutMe.vue'
import PostCreate from '../components/views/PostCreate.vue'



const routes = [
    {
        path:'/',
        name:'home',
        component:Home
    },
    {
        path:'/forum',
        name:'forum',
        component:Forum
    },
    {
        path:'/postcreate',
        name:'postCreate',
        component:PostCreate
    },
    {
        path:'/register',
        name:'register',
        component:Register
    },
    {
        path:'/login',
        name:'login',
        component:Login
    },
    {
        path:'/about',
        name:'about',
        component:About
    },
    {
        path:'/aboutMe',
        name:'aboutMe',
        component:AboutMe
    },
];

const router = createRouter({
    history:createWebHashHistory(),
    routes,
});

export default router
