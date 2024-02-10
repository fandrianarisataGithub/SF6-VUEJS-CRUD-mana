import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import '@fortawesome/fontawesome-free/css/all.min.css';
import './style/main.scss';

import Vue from 'vue';

import axios from 'axios';
import { BootstrapVue } from 'bootstrap-vue';

import App from './App.vue';
import router from './router/main';
import store from './store/main';

Vue.use(BootstrapVue)
axios.defaults.baseURL = 'http://localhost:8000/api'

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#root')
