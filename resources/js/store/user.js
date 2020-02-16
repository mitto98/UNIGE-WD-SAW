import axios from "../axios.js";

const AUTH_REQUEST = "LOGIN";
const AUTH_SUCCESS = "LOGIN_SUCCESS";
const AUTH_ERROR = "AUTH_ERROR";
const AUTH_LOGOUT = "LOGOUT";
const STORE_USER = "STORE_USER";
const UNSTORE_USER = "UNSTORE_USER";

export default {
  namespaced: true,
  state: {
    token: localStorage.getItem("user_token") || "",
    refresh_token: localStorage.getItem("refresh_token") || "",
    status: localStorage.getItem("user_token") ? "success" : "waiting",
    user_name: localStorage.getItem("user_name") || "",
  },
  getters: {
    isLoggedIn: state => state.status === "success" && !!state.token,
    isLoading: state => state.status === "loading",
    userName: state => state.user_name
  },
  mutations: {
    [AUTH_REQUEST]: state => {
      state.status = "loading";
    },
    [AUTH_SUCCESS]: (state, tokens) => {
      state.status = "success";
      localStorage.setItem("user_token", tokens.access_token);
      localStorage.setItem("refresh_token", tokens.refresh_token);
      axios.defaults.headers["Authorization"] = tokens.access_token
      state.token = tokens.access_token;
      state.refresh_token = tokens.refresh_token;
    },
    [AUTH_ERROR]: state => {
      state.status = "error";
    },
    [AUTH_LOGOUT]: state => {
      state.status = "waiting";
      state.token = "";
      localStorage.removeItem("user_token");
      localStorage.removeItem("refresh_token");
      // remove the axios default header
      delete axios.defaults.headers["Authorization"];
    },
    [STORE_USER]: (state, user) =>{
      localStorage.setItem("user_name",user.user.name)
      state.user_name = user.user.name
    },
    [UNSTORE_USER]: state =>{
      localStorage.removeItem("user_name")
      state.user_name = ""
    }
  },
  actions: {
    doLogin: (context, user) => {
      context.commit(AUTH_REQUEST);
      return axios
        .post("/oauth/token", {
          grant_type: "password",
          client_id: process.env.MIX_OAUTH_CLIENT_ID,
          client_secret: process.env.MIX_OAUTH_CLIENT_SECRET,
          username: user.email,
          password: user.password,
          scope: "*"
        })
        .then(response => {
          const token = "Bearer " + response.data.access_token;
          context.commit(AUTH_SUCCESS, {
            access_token: token,
            refresh_token: response.data.refresh_token
          });
          context.dispatch("init", null, { root: true });

          axios.get(`/api/user`).then(response => {
            context.commit(STORE_USER,{
              user: response.data
            });
          });
        });
    },
    doLogout: ({ commit, dispatch }) => {
      return new Promise((resolve, reject) => {
        resolve();
      }).then(()=> {
        commit(AUTH_LOGOUT);
        commit(UNSTORE_USER);
      });
    },
    renewToken: context => {
      console.log("Refreshing access token", !context.getters.isLoading);
      if (!context.getters.isLoading) {
        console.log("ACC refresh at", !context.getters.isLoading);
        context.commit(AUTH_REQUEST);
        return axios.post("/oauth/token", {
          grant_type: "refresh_token",
          client_id: process.env.MIX_OAUTH_CLIENT_ID,
          client_secret: process.env.MIX_OAUTH_CLIENT_SECRET,
          refresh_token: context.state.refresh_token,
          scope: "*"
        }).then(response => {
          const token = "Bearer " + response.data.access_token;
          context.commit(AUTH_SUCCESS, {
            access_token: token,
            refresh_token: response.data.refresh_token
          });
        });
      }
    },
  }
};
