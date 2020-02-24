<template>
    <div>
        <nav class="site-header sticky-top py-1">
            <div class="container d-flex flex-column flex-md-row justify-content-between">
                <a class="py-2" href="#" aria-label="Product">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
                </a>
                <a class="py-2 d-none d-md-inline-block" href="#">
                    <router-link :to="{name: 'products'}">Productos</router-link> 
                </a>
                <a class="py-2 d-none d-md-inline-block" href="#">
                    <router-link :to="{name: 'checkout'}">Carro</router-link> 
                </a>
            </div>
        </nav>

        <transition name="slide-fade" mode="out-in">
            <router-view></router-view>
        </transition>
    </div>
</template>