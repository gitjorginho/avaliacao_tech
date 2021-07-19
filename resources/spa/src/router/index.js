import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../views/Login.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    component: Login
  },
  {
    path: '/dashboard',
    component: () => import(/* webpackChunkName: "about" */ '../views/Dashboard.vue'),
    children:[
        {
            path:'usuarios',
            component:() => import('../views/Usuarios.vue'),
        },
        {
            path:'tarefas',
            component:() => import('../views/Tarefas.vue'),
        }

    ]
  }
]

const router = new VueRouter({
  routes
})

export default router
