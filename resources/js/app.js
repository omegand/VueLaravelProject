import Vue from 'vue';
import router from './router';

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('login', require('./components/login.vue').default);
Vue.component('addtopic', require('./components/addTopicForm.vue').default);
Vue.component('topiclist', require('./components/topicList.vue').default);
Vue.component('app', require('./components/app.vue').default);
Vue.component('topic', require('./components/topic.vue').default);
Vue.component('Button', require('./components/Button.vue').default);
Vue.component('footvue', require('./components/footer.vue').default);
Vue.component('headvue', require('./components/header.vue').default);
Vue.component('nbar', require('./components/navbar.vue').default);

const app = new Vue({
    el: '#app',
    router
});