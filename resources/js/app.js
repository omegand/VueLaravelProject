require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('secret-component', require('./components/SecretComponent.vue').default);
Vue.component('app', require('./components/app.vue').default);

const app = new Vue({
    el: '#app',
});
