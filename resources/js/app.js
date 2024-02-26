import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";


import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';



import Router from "./router.js";
import { createApp } from 'vue';


const app = createApp({});

/* >>>>>>>> LAYOUTS VUE  >>>>>>>> */
import DefaultLayouts from "./layouts/Default.vue";
app.component("default-layout", DefaultLayouts);

import AdminLayouts from "./layouts/Admin.vue";
app.component("admin-layout", AdminLayouts);

/* ALL VUE */
import App from './App.vue';
app.component('App', App);

import Popup from "./admin/components/PopupComponent.vue";
app.component("Popup", Popup);

import Loading from "./admin/components/LoadingComponent.vue";
app.component("Loading", Loading);


/* >>>>>>>> USERS VUE  >>>>>>>> */
/* >>>>>>>> USER PAGES */
import Home from './users/pages/Home.vue';
app.component('Home', Home);

/* >>>>>>>> ADMIN VUE  >>>>>>>> */
/* >>>>>>>> ADMIN PAGES */


// **** //
app
.use (Toast, {
    transition: "Vue-Toastification__bounce",
    maxToasts: 10,
    newestOnTop: true,
    timeout: 1800,
})
.use(Router)
.mount('#app');