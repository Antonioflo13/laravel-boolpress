window.Vue = require('vue');
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import App from './app.vue';

const app = new Vue({
    el: '#root',
    render: h => h(App)
});