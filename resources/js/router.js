import Index from "./pages/Index";
import AreasDetails from "./components/AreasDetails/AreasDetails";

export default {
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'index',
      component: Index
    },
    {
      path: '/areas/:areas_id',       //da aggiungere l'id
      name: 'area',
      component: AreasDetails
    }
  ],
}
