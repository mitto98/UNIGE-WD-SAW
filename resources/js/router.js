import Index from "./pages/Index";
import Area from "./pages/Area";
import CoursesDetails from "./pages/CoursesDetails";

export default {
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'index',
      component: Index
    },
    {
      path: '/areas/:areas_id',
      name: 'area',
      component: Area
    },
    {
      path: '/areas/:areas_id/courses/:course_id',
      name: 'course',
      component: CoursesDetails
    }
  ],
}
