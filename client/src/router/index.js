import Vue from 'vue'
import VueRouter from 'vue-router'
import List from '../components/List.vue'
import Detail from '../components/Detail.vue'
import Create from '../components/Create.vue'
import Modify from '../components/Modify.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'List',
    component: List
  },
  {
    path: '/create',
    name: 'Create',
    component: Create
  },
  {
    path: '/detail/:id',
    name: 'Detail',
    component: Detail
  },
  {
    path: '/modify/:id',
    name: 'Modify',
    component: Modify
  },
  
  
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
