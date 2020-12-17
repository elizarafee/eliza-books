import Vue from "vue";
import Router from "vue-router";
//import Home from "./views/Home.vue";
import Welcome from "./views/Welcome.vue";
import Books from "./views/Books.vue";
import Contact from "./views/Contact.vue";
import Dashboard from "./views/Dashboard.vue";

Vue.use(Router);

export default new Router({
  mode: "history",
  base: process.env.BASE_URL,
  routes: [
    {
      path: "/",
      name: "welcome",
      component: Welcome
    },
    {
      path: "/books",
      name: "books",
      component: Books
    },
    {
      path: "/contact",
      name: "contact",
      component: Contact
    },
    {
      path: "/dashboard",
      name: "dashboard",
      component: Dashboard
    },
    {
      path: "/about",
      name: "about",
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () =>
        import(/* webpackChunkName: "about" */ "./views/About.vue")
    }
  ]
});
