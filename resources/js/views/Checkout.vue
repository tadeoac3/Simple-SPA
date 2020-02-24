<template>
    <div>

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading"> Cart </h1>
            </div>
        </section>

        <div class="row justify-content-center">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col-1">#</th>
                        <th scope="col-4">Nombre</th>
                        <th scope="col-6">Descripción</th>
                        <th scope="col-1">Precio</th>
                        <th scope="col-1">Quitar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in products" :key="product.id">
                        <th scope="row">{{ product.id }}</th>
                        <td><router-link :to="{name: 'productDetails', params: {id: product.id, slug: product.slug}}">{{ product.name }}</router-link></td>
                        <td>{{ product.description }}</td>
                        <td>{{ product.price }}</td>
                        <td>
                            <a href="" @click.prevent="removeAndUpdateProducts(product)" class="is-cart"> Remover </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- <i class="fas fa-bars"></i> -->
        
    </div>
</template>

<script>
    import { apiHost } from '../config';

    export default {
        props: ['id'],
        data() {
            return {
                productId: this.id,
                products: [],
            }
        },
        methods: {
            getProductsCart() {
                axios.get(apiHost + 'products/get-products-in-cart')
                .then( res => {
                    this.products = res.data.data;
                })
                .catch( err => {
                    console.log(err);
                })
            },
            removeAndUpdateProducts(product) {
                axios.post(apiHost + 'products/remove-and-update-products', {'id': product.id})
                .then( res => {
                    console.log(res);
                    this.products = res.data.data;
                    // Vue.set(this.products.find(item => item.id == product.id), 'is_cart', false);
                })
                .catch( err => {
                    console.log(err);
                })
            }
        },
        created() {
            // this.addProductToCart();
            this.getProductsCart();
        }
    }
</script>

<style scoped>
    .is-cart {
        color: red;
    }
</style>