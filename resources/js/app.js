import Vue from "vue";
import router from "./router";
import store from "./vuex";
import i18n from "./i18n";
import Gravatar from 'vue-gravatar';

import {library} from '@fortawesome/fontawesome-svg-core'
import {faUserSecret,  faArrowCircleRight, faUser, faPencilAlt, faSave, faTimesCircle, faBars } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faUserSecret);
library.add(faArrowCircleRight);
library.add(faUser);
library.add(faPencilAlt);
library.add(faSave);
library.add(faTimesCircle);
library.add(faBars);

import App from "./App.vue";

window.Vue = require('vue');

Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.component('v-gravatar', Gravatar);

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  i18n,
  render: h => h(App)
}).$mount('#app');
