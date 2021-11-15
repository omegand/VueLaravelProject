require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('login', require('./components/login.vue').default);
Vue.component('addtopic', require('./components/addTopicForm.vue').default);
Vue.component('topiclist', require('./components/topicList.vue').default);
Vue.component('app', require('./components/app.vue').default);
Vue.component('topic', require('./components/topic.vue').default);
Vue.component('Button', require('./components/Button.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
