import Vue from 'vue';
import Router from 'vue-router';
import ErrorPage from './views/404.vue';
import Products from './views/Products.vue';
import Checkout from './views/Checkout.vue';
import ProductDetails from './views/ProductDetails.vue';

import ProductAdmin from './views/admin/Products.vue'

Vue.use(Router);

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'products',
            component: Products
        },
        {
            props: true,
            path: '/checkout',
            name: 'checkout',
            component: Checkout
        },
        {
            props: true,
            path: '/product/:id/:slug',
            name: 'productDetails',
            component: ProductDetails
        },
        {
            path: '/admin/products',
            name: 'productAdmin',
            component: ProductAdmin
        },
        {
            path: '*',
            component: ErrorPage
        }
    ],
});