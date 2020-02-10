import Index from "./pages/Index";
import Area from "./pages/Area";
import CoursesDetails from "./pages/CoursesDetails";
import Login from "./pages/login";
import Reset from "./pages/reset";
import Gdpr from "./pages/gdpr";
import Help from "./pages/help";

export default {
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'index',
      component: Index
    },
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: '/reset',
      name: 'reset',
      component: Reset
    },
    {
      path: '/areas/:area',
      name: 'area',
      component: Area
    },
    {
      path: '/areas/:area/courses/:course',
      name: 'course',
      component: CoursesDetails
    },
    {
      path: '/gdpr',
      name: 'gdpr',
      component: Gdpr
    },
    {
      path: '/help',
      name: 'help',
      component: Help
    },
  ],
}
