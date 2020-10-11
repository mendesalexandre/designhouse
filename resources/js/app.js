require('./bootstrap');

window.Vue = require('vue');

// Rotas
import router from './routers/routers'

// COMPONENTS
Vue.component('app-component', require('./components/frontend/app/App').default);

const app = new Vue({
    el: '#app',
    router
});
