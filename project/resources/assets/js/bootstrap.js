import Vue from 'vue';
import axios from 'axios';
import VueRouter from 'vue-router';
import VueX from 'vuex';
import moment from 'moment';
import BootstrapVue from 'bootstrap-vue';
import Form from './utils/forms/Form';

window.Vue = Vue;
Vue.use(VueRouter);
Vue.use(VueX);
Vue.use(BootstrapVue);

//window.Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrf-token').getAttribute('content');

window.axios = axios;
window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': document.querySelector('#csrf-token').getAttribute('content'),
    'X-Requested-With': 'XMLHttpRequest'
};

window.Form = Form;