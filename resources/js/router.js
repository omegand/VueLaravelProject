import Vue from 'vue';
import VueRouter from 'vue-router';
import body from './components/body'
import about from './components/about'
import login from './components/login'
import addtopic from './components/addTopicForm'
import addpost from './components/addPostForm'

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', component: body, props: true },
        { path: '/about', component: about, props: true },
        { path: '/home', component: body, props: true },
        { path: '/login', component: login, props: true },
        { path: '/addtopic', component: addtopic, props: true },
        { path: '/addpost', component: addpost, props: true },
    ],
    mode: 'history'
})