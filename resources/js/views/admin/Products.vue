<template>
    <div>

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading"> Administración de Productos </h1>
            </div>
        </section>

        <div class="row justify-content-center">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col-1">#</th>
                        <th scope="col-5">Nombre</th>
                        <th scope="col-1">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in products" :key="product.id">
                        <th scope="row">{{ product.id }}</th>
                        <td>{{ product.name }}</td>
                        <td>
                            <!-- <a href="" @click.prevent="changeCartStatus(product)" :class="{'is-cart': product.is_cart}">
                                {{ statusCart(product) }}
                            </a> -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
    import { apiHost } from '../../config';

    export default {
        name: 'ProductView',
        data() {
            return {
                products: [],
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
        },
        created() {
            this.getProducts();
        },
    }
</script>