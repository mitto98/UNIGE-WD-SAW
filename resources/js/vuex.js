import Vue from "vue";
import Vuex from 'vuex'

import user from "./store/user";

Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    count: 0
  },
  mutations: {
    increment (state) {
      state.count++
    }
  },
  modules: {
    user,
  }
});

export default store;
