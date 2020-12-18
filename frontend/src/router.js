import Vue from "vue";
import Router from "vue-router";
//import Home from "./views/Home.vue";
import Welcome from "./views/Welcome.vue";
import Books from "./views/Books.vue";
import Contact from "./views/Contact.vue";
import Dashboard from "./views/Dashboard.vue";
import AddBook from "./views/AddBook.vue";
import BookDetailsView from "./views/BookDetailsView.vue";

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
      path: "/books/create",
      name: "add-book",
      component: AddBook
    },
    {
      path: "/books/:book_id",
      name: "BookDetailsView",
      component: BookDetailsView
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
    }
  ]
});
