<template>
    <div>

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading"> Productos </h1>
            </div>
        </section>

        <div class="row justify-content-center">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col-1">#</th>
                        <th scope="col-3">Nombre</th>
                        <th scope="col-6">Descripción</th>
                        <th scope="col-1">Precio</th>
                        <th scope="col-1">Carrito</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in products" :key="product.id">
                        <th scope="row">{{ product.id }}</th>
                        <td><router-link :to="{name: 'productDetails', params: {id: product.id, slug: product.slug}}">{{ product.name }}</router-link></td>
                        <td>{{ product.description }}</td>
                        <td>{{ product.price }}</td>
                        <td>
                            <a href="" @click.prevent="changeCartStatus(product)" :class="{'is-cart': product.is_cart}">
                                {{ statusCart(product) }}
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    
    </div>
</template>

<script>
    import { apiHost } from '../config';

    export default {
        name: 'ProductView',
        data() {
            return {
                products: [],
                isCart: false,
            }
        },
        methods: {
            getProducts() {
                axios.get(apiHost + 'products')
                .then( res => {
                    this.products = res.data.data;
                })
                .catch( err => {
                    console.log(err);
                })
            },
            changeCartStatus(product) {
                product.is_cart ? this.removeProductFromCart(product) : this.addProductToCart(product);
            },
            addProductToCart(product) {
                axios.post(apiHost + 'products/add-to-cart', {'id': product.id})
                .then( res => {
                    console.log(res);
                    Vue.set(this.products.find(item => item.id == product.id), 'is_cart', true);
                })
                .catch( err => {
                    console.log(err);
                })
            },
            removeProductFromCart(product) {
                axios.post(apiHost + 'products/remove-from-cart', {'id': product.id})
                .then( res => {
                    console.log(res);
                    Vue.set(this.products.find(item => item.id == product.id), 'is_cart', false);
                })
                .catch( err => {
                    console.log(err);
                })
            },
            statusCart(product) {
                return product.is_cart ? 'Remover' : 'Añadir';
            },
        },
        created() {
            this.getProducts();
        },
    }
</script>

<style scoped>
    .is-cart {
        color: red;
    }
</style>