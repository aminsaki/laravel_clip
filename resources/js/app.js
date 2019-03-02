
require('./bootstrap');



import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter);
import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);



const routes = [
      { path: '/categories', component: require('./components/Categories/CategoriesComponent').default  },
      { path: '/ShowCategories', component: require('./components/Categories/ShowCategories').default  },
      { path: '/EditCategories/:id', component: require('./components/Categories/EditCategories').default ,name: 'EditCategories' },
];

const router = new VueRouter({
    routes
});


const app = new Vue({
    el: '#app',
    router
});
