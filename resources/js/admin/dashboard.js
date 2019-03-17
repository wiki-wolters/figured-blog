require('../bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import axios from 'axios';

axios.defaults.headers.common = {
  'X-CSRF-TOKEN': window.Laravel.csrfToken,
  'X-Requested-With': 'XMLHttpRequest',
  'Authorization': 'Bearer ' + window.Laravel.apiToken,
};

import App from './components/DashBoard.vue';
import Index from './components/pages/Posts.vue';
import Create from './components/pages/PostEdit.vue';
import Edit from './components/pages/PostEdit.vue';

const routes = [
  {
    name: 'post.create',
    path: '/posts/create',
    component: Create
  },
  {
    name: 'posts',
    path: '/',
    component: Index
  },
  {
    name: 'post.edit',
    path: '/posts/edit/:id',
    component: Edit,
    props: true
  }
];

const router = new VueRouter({ mode: 'history', base: '/admin', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
