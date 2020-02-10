import routes from "./router";
import VueRouter from 'vue-router';
import VueI18n from 'vue-i18n';


import {library} from '@fortawesome/fontawesome-svg-core'
import {faUserSecret, faArrowCircleRight, faUser} from '@fortawesome/free-solid-svg-icons'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'

library.add(faUserSecret);
library.add(faArrowCircleRight);
library.add(faUser);

import App from "./App.vue";

window.Vue = require('vue');

Vue.use(VueRouter);
Vue.component('font-awesome-icon', FontAwesomeIcon);

// require('./bootstrap');

const router = new VueRouter(routes);

const i18n = new VueI18n({
  locale: 'it',
  fallbackLocale: 'en',
  messages: {
    it: require('../locales/it'),
    en: require('../locales/en'),
  }
});

new Vue({
  render: h => h(App),
  router,
  i18n
}).$mount('#app')
