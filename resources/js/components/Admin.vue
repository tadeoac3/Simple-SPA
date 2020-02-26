<template>
    <div>
        
        <nav class="site-header sticky-top py-1">
            <div class="container d-flex flex-column flex-md-row justify-content-between">
                <a class="py-2" href="#" aria-label="Product">
                </a>
            </div>
        </nav>

        <transition name="slide-fade" mode="out-in">
            <router-view></router-view>
        </transition>

    </div>
</template>