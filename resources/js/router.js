import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home';
import Blog from './pages/Blog';
import Details_page from './pages/Details_page';
import Contact from './pages/Contact';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/blog',
            name: 'blog',
            component: Blog
        },
        {
            path: '/blog/:slug',
            name: 'details-page',
            component: Details_page
        },
        {
            path: '/contact-us',
            name: 'contact-us',
            component: Contact
        }
    ]
});

export default router;