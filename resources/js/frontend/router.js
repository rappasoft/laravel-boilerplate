import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

const routes = [
    {
      path: '/',
      name: 'Home',
      component: () => import(/* webpackChunkName: "about" */ './components/pages/Home.vue')
    },
    {
      path: '/about',
      name: 'About',
      meta: {
        auth: true
      },
      component: () => import(/* webpackChunkName: "about" */ './components/pages/About.vue')
    },
    {
      path: '/login',
      name: 'Login',
      component: () => import(/* webpackChunkName: "login" */ './components/pages/Login.vue')
    }
  ]
  
  const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
  })
  
  router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem('access_token')
  
    if (to.matched.some(record => record.meta.auth) && !loggedIn) {
      next('/login')
      return
    }
    next()
  })
  
  export default router