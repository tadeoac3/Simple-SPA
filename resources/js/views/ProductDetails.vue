<template>
    <div>

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading"> Detalles del Producto </h1>
            </div>
        </section>

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ product.name }}</h5>
                        <p class="card-text">{{ product.description }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import { apiHost } from '../config';

    export default {
        props: ['id'],
        data() {
            return {
                productId: this.id,
                product: [],
            }
        },
        methods: {
            getProductDetails() {
                axios.get(apiHost + 'products/' + this.productId)
                .then( res => {
                    console.log(res.data);
                    this.product = res.data.data
                })
                .catch( err => {
                    console.log(err);
                })
            }
        },
        created() {
            this.getProductDetails();
        }
        
    }
</script>