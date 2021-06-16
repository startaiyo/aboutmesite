/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router';
import router from './router';



window.Vue = require('vue').default;
Vue.use(VueRouter);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('navbar',require('./components/Navbar.vue').default);
Vue.component('works',require('./components/works.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vuetify from 'vuetify'; //★
import 'vuetify/dist/vuetify.min.css'; //★
import '@mdi/font/css/materialdesignicons.css'; //★
Vue.use(Vuetify); //★

export default new Vuetify({
    icons: {
        iconfont: 'mdi'
    },
    theme: {
        dark: true,
    }
})
const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify(), 
});
