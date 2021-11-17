import Vue from 'vue';
import VueRouter from 'vue-router';
import body from './components/body'
import login from './components/login'
import addtopic from './components/addTopicForm'

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', component: body, props: true },
        { path: '/home', component: body, props: true },
        { path: '/login', component: login, props: true },
        { path: '/addtopic', component: addtopic, props: true },
    ],
    mode: 'history'
})