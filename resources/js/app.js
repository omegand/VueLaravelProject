import Vue from 'vue';
import router from './router';
import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { BootstrapVue } from 'bootstrap-vue'
Vue.use(BootstrapVue)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
require('./bootstrap');

library.add(fas)
window.Vue = require('vue').default;
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.component('login', require('./components/login.vue').default);
Vue.component('addtopic', require('./components/addTopicForm.vue').default);
Vue.component('addpost', require('./components/addPostForm.vue').default);
Vue.component('topiclist', require('./components/topicList.vue').default);
Vue.component('app', require('./components/app.vue').default);
Vue.component('topic', require('./components/topic.vue').default);
Vue.component('Button', require('./components/Button.vue').default);
Vue.component('footvue', require('./components/footer.vue').default);
Vue.component('nbar', require('./components/navbar.vue').default);
Vue.component('about', require('./components/about.vue').default);
Vue.component('post', require('./components/post.vue').default);

const userinfo = document.querySelector("meta[name='user']").getAttribute('content');
if (userinfo == "") Vue.prototype.$user = ""
else Vue.prototype.$user = JSON.parse(userinfo)

const app = new Vue({
    el: '#app',
    router
});
