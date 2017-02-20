require('./bootstrap');

import Vue from 'vue'
import App from './App.vue'
import store from './store'

new Vue({
  el: '#skeleton',
  store,	
  render: h => h(App)
})