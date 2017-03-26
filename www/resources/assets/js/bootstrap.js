import Vue from 'vue';
import axios from 'axios';
import VueRouter from 'vue-router';
import lodash from 'lodash';
import Form from './utils/forms/Form';

window._ = lodash;
window.Vue = Vue;
window.axios = axios;
window.Form = Form;


Vue.use(VueRouter);


const csrfToken = document.getElementById("csrf-token").content;

window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};


