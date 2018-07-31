require('./bootstrap');

import Vue from 'vue';
import SignupComponent from './components/SignupComponent'

const app = new Vue({
    el: "#app",
    components: {SignupComponent}

});
