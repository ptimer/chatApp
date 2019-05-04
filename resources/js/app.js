
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex';
import StoreData from './store';

const store = new Vuex.Store(StoreData);

import chatApp from './components/ChatApp.vue';
Vue.component('chat-app', chatApp)

const app = new Vue({
    el: '#app',
    data() {
      return {

      }
    }
});
