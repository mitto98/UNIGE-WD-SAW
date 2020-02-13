import Vue from "vue";
import router from "./router";
import store from "./vuex";
import i18n from "./i18n";

import {library} from '@fortawesome/fontawesome-svg-core'
import {faUserSecret,  faArrowCircleRight, faUser, faPencilAlt, faSave, faTimesCircle } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faUserSecret);
library.add(faArrowCircleRight);
library.add(faUser);
library.add(faPencilAlt);
library.add(faSave);
library.add(faTimesCircle);

import App from "./App.vue";

window.Vue = require('vue');

Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  i18n,
  render: h => h(App)
}).$mount('#app');
