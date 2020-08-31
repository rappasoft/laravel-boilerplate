import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import User from '../models/User'

const routes = [
  {
    path: '/',
    name: 'Home',
    meta: { layout: "default" },
    component: () => import('./components/pages/Home.vue')
  },
  {
    path: '/about',
    name: 'About',
    meta: {
      auth: true,
      layout: "no-nav-bar"
    },
    component: () => import('./components/pages/About.vue')
  },
  {
    path: '/login',
    name: 'Login',
    meta: { layout: "no-nav-bar" },
    component: () => import('./components/pages/Login.vue')
  },
  {
    path: '/register',
    name: 'Register',
    meta: { layout: "no-nav-bar" },
    component: () => import('./components/pages/Register.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.beforeEach((to, from, next) => {
  const access_token = localStorage.getItem('access_token')

  if (to.matched.some(record => record.meta.auth) && !access_token) {
    next('/login')
    return
  }
  if (access_token){
    window.axios.defaults.headers.common = {
      'Authorization': `Bearer ${access_token}`,
      'Device-Id': access_token,
      'Device-Name': `custom_browser`,
      'Accept': `application/json`,
    }
    
    User.get().then(function(response){
      localStorage.setItem('auth', true);
      localStorage.setItem('username', response[0].display_name);
    });
    // .catch(err => {
    //   next('/login')
    //   return
    // });
  }

  next()
})

export default router