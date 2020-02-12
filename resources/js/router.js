import Vue from "vue";
import VueRouter from "vue-router";

import CoursesDetails from "./pages/CoursesDetails";

Vue.use(VueRouter);

export default new VueRouter({
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
      component: require("./pages/login").default
    },
    {
      path: '/reset',
      name: 'reset',
      component: require("./pages/reset").default
    },
    {
      path: '/areas/:area',
      name: 'area',
      component: require("./pages/Area").default
    },
    {
      path: '/areas/:area/courses/:course',
      name: 'course',
      component: CoursesDetails
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
  ],
});
