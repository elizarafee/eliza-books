import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";

import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle";

import Vuelidate from "vuelidate";
Vue.use(Vuelidate);

import VueToast from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";


Vue.use(VueToast);

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: (h) => h(App),
}).$mount("#app");
