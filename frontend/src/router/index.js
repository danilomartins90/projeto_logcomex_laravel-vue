import { createRouter, createWebHistory } from 'vue-router'
import Home from '@/pages/Home.vue'
import Detail from '@/pages/Detail.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/detalhes/:id',
    name: 'Detail',
    component: Detail,
    props: true,
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router