import Vue from 'vue';
import VueRouter from 'vue-router';
import body from './components/body'

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', component: body, props: true },
        { path: '/home', component: body, props: true }
    ],
    mode: 'history'
})