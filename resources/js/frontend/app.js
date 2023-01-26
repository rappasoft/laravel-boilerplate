/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import '../bootstrap'
import '../plugins'

import {createApp} from 'vue/dist/vue.esm-bundler'

/**
 *  Here we import the component to a javascript variable and use this to
 *  add the component to the app.
 */

import ExampleComponent  from './components/ExampleComponent.vue'
// import App  from './components/App.vue'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = createApp({
    components: {
        ExampleComponent
    }
})
app.mount('#app')

/**
 * You can also make a fresh Vue application with the default component
 * as a parent component.
 */

// const app = createApp(App)
// app.mount('#app')
