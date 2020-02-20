import Vue from "vue";
import VueRouter from "vue-router";
import not_found from "./pages/not_found";
import store from "./vuex";

Vue.use(VueRouter);

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'index',
      component: require("./pages/Index").default
    },
    {
      path: '/login',
      name: 'login',
      component: require("./pages/login").default,
      meta: {
        requiresUnauth: true
      }
    },
    {
      path: '/reset',
      name: 'reset',
      component: require("./pages/reset").default,
      meta: {
        requiresUnauth: true
      }
    },
    {
      path: '/reset/:key',
      name: 'doReset',
      component: require("./pages/doReset").default,
      meta: {
        requiresUnauth: true
      }
    },
    {
      path: '/register',
      name: 'register',
      component: require("./pages/register").default,
      meta: {
        requiresUnauth: true
      }
    },
    {
      path: '/areas/:area',
      name: 'area',
      component: require("./pages/Area").default
    },
    {
      path: '/areas/:area/courses/:course',
      name: 'course',
      component: require("./pages/Course").default
    },
    {
      path: '/gdpr',
      name: 'gdpr',
      component: require("./pages/gdpr").default
    },
    {
      path: '/help',
      name: 'help',
      component: require("./pages/help").default
    },
    {
      path: '/chat',
      name: 'chat',
      component: require("./pages/Chat").default,
      meta: {
        requiresAuth: true
      }

    },
    {
      path: '/user_details',
      name: 'user_details',
      component: require("./pages/UserDetails").default,
      meta: {
        requiresAuth: true
      }
    },
    {
      path: '/user_edit',
      name: 'user_edit',
      component: require("./pages/UserEdit").default
    },
    {
      path: '*',
      name: "not_found",
      component: require('./pages/not_found').default
    }
  ],
});

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (!store.getters["auth/isLoggedIn"]) {
      next({path: 'login'});
    }
  } else if (to.matched.some(record => record.meta.requiresUnauth)) {
    if (store.getters["auth/isLoggedIn"]) {
      next({path: '/'});
    }
  }
  next();
});

export default router;
