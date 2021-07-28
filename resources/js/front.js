window.Vue = require('vue');

import App from './app.vue';

const app = new Vue({
    el: '#root',
    render: h => h(App)
});