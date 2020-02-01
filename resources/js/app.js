import routes from "./router";
import VueRouter from 'vue-router'


import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret, faStar, faStarHalf,faStarHalfAlt } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faUserSecret);
library.add(faStar);
library.add(faStarHalf);
library.add(faStarHalfAlt);

import App from "./App.vue";

window.Vue = require('vue');

Vue.use(VueRouter);
Vue.component('font-awesome-icon', FontAwesomeIcon)


// require('./bootstrap');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const router = new VueRouter(routes);

new Vue({
    render: h => h(App),
    router,
}).$mount('#app')
