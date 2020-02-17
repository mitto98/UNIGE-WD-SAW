import Vue from "vue";
import Vuex from 'vuex'
import axios from "./axios";
import auth from "./store/auth";

Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    user: null,
  },
  getters: {
    user: state => state.user,
  },
  mutations: {
    setUser: (state, user) => {
      state.user = user
    },
  },
  actions: {
    init: ({commit}) => {
      return axios.get("/api/user")
        .then(response => {
          commit('setUser', response.data);
        }).catch(() => {
          commit('setUser', null);
        });
    }
  },

  modules: {
    auth,
  }
});

export default store;
