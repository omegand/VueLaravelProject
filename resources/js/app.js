require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('login', require('./components/login.vue').default);
Vue.component('addpost', require('./components/addPostForm.vue').default);
Vue.component('listview', require('./components/addPostForm.vue').default);
Vue.component('app', require('./components/app.vue').default);
Vue.component('post', require('./components/listPost.vue').default);

const app = new Vue({
    el: '#app',
});
