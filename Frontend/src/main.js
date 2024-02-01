import { createApp } from 'vue'
import {createRouter, createWebHistory } from 'vue-router'
import './style.css'
import App from './App.vue'

import Dashboard from '/src/pages/Dashboard.vue'
import Signup from '/src/pages/Signup.vue'
import Login from '/src/pages/Login.vue'
import Selfcare from '/src/pages/Selfcare.vue'
import Task from '/src/pages/Task.vue'
import Notes from '/src/pages/Notes.vue'
import Creernote from '/src/pages/Creernote.vue'


const router = createRouter({
    history: createWebHistory(),

    routes: [
        { path: '/', name: 'Dashboard', component: Dashboard },
        { path: '/register', name: 'Signup', component: Signup },
        { path: '/login', name: 'Login', component: Login },
        { path: '/self-care', name: 'Selfcare', component: Selfcare },
        { path: '/self-care-task', name: 'Task', component: Task },
        { path: '/notes', name: 'Notes', component: Notes },
        { path: '/note', name: 'Note', component: Creernote }

    ]
})

createApp(App)
.use(router)
.mount('#app')
