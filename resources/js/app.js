import Vue from "vue";
import router from "./router";
import store from "./vuex";
import i18n from "./i18n";

import App from "./App.vue";

import {library} from '@fortawesome/fontawesome-svg-core'
import {faUserSecret, faArrowCircleRight, faUser} from '@fortawesome/free-solid-svg-icons'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
library.add(faUserSecret);
library.add(faArrowCircleRight);
library.add(faUser);
Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  i18n,
  render: h => h(App)
}).$mount('#app');
