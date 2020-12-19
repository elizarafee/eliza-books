import Vue from "vue";
import Router from "vue-router";
import WelcomeView from "./views/WelcomeView.vue";
import BooksView from "./views/BooksView.vue";
import ContactView from "./views/ContactView.vue";
import DashboardView from "./views/DashboardView.vue";
import AddBookView from "./views/AddBookView.vue";
import BookDetailsView from "./views/BookDetailsView.vue";

Vue.use(Router);

export default new Router({
  mode: "history",
  base: process.env.BASE_URL,
  routes: [
    {
      path: "/",
      component: WelcomeView,
    },
    {
      path: "/books/create",
      component: AddBookView,
    },
    {
      path: "/books/:book_id",
      component: BookDetailsView,
    },
    {
      path: "/books",
      component: BooksView,
    },
    {
      path: "/contact",
      component: ContactView,
    },
    {
      path: "/dashboard",
      component: DashboardView,
    },
  ],
});
