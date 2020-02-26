<template>
    <div>

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading"> Administración de Productos </h1>
            </div>
        </section>

        <section class="mb-3">
            <div class="row">
                <div class="col-2 offset-10">
                    <button class="btn btn-primary" @click.prevent="createProductModal()" data-target="#createModal"  data-toggle="modal">Nuevo Producto</button>
                </div>
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
                            <button class="btn btn-primary" @click.prevent="editProductModal(product)" data-target="#editModal"  data-toggle="modal">Editar</button>
                            <button class="btn btn-danger" @click.prevent="openDeleteModal(product)" data-target="#deleteModal"  data-toggle="modal">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Nuevo Producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" name="createProduct" id="createProduct" action="#" @submit.prevent="createProduct">
                            <div class="form-group">
                                <label for="title">Nombre</label>
                                <input type="text" name="name" id="name-new" class="form-control" placeholder="Nombre" v-model="product.name" />
                            </div>
                            <div class="form-group">
                                <label for="post_content">Descripción</label>
                                <textarea name="description" id="description-new" class="form-control" placeholder="Descripción" v-model="product.description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">Precio</label>
                                <input type="number" name="price" id="price-new" class="form-control" placeholder="Costo" v-model="product.price"/>
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-success">{{ messageStatusProduct }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" name="updateProduct" id="updateProduct" action="#" @submit.prevent="updateProduct">
                            <div class="form-group">
                                <label for="title">Nombre</label>
                                <input type="text" name="name" id="name-update" class="form-control" placeholder="Nombre" v-model="product.name" />
                            </div>
                            <div class="form-group">
                                <label for="post_content">Descripción</label>
                                <textarea name="description" id="description-update" class="form-control" placeholder="Descripción" v-model="product.description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">Precio</label>
                                <input type="number" name="price" id="price-update" class="form-control" placeholder="Costo" v-model="product.price"/>
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-success">{{ messageStatusProduct }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <p>Are you sure want to delete the record? </p>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-success" v-on:click="hideModal()">Cancel</button>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-success" v-on:click="deleteProduct()">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
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
                // product: '',
                product: {
                    'name': '',
                    'description': '',
                    'price': '',
                },
                messageStatusProduct: '',
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
            openDeleteModal(product) {
                this.product = product;
            },
            createProductModal() {
                this.messageStatusProduct = 'Guardar';
            },
            editProductModal(product) {
                this.product = product;
                this.messageStatusProduct = 'Actualizar';
            },
            createProduct() {
                axios.post(apiHost + 'products/', { 
                    'name': this.product.name,
                    'description': this.product.description,
                    'price': this.product.price
                })
                .then( res => {
                    this.products.push(res.data.data);
                    this.product = '';
                    this.hideModal();
                })
                .catch( err => {
                    console.log(err);
                })
            },
            updateProduct() {
                axios.put(apiHost + 'products/' + this.product.id, { 
                    'name': this.product.name,
                    'description': this.product.description,
                    'price': this.product.price
                })
                .then( res => {
                    this.products.push(res.data.data);
                    this.hideModal();
                })
                .catch( err => {
                    console.log(err);
                })
            },
            deleteProduct() {
                axios.delete(apiHost + 'products/' + this.product.id)
                .then( res => {
                    let vm = this;
                    let index = this.products.findIndex(function(prod) {
                        return prod.id == vm.product.id
                    });
                    this.products.splice(index, 1);
                    this.hideModal();
                })
                .catch( err => {
                    console.log(err);
                })
            },
            hideModal() {
                $('#createModal').modal('hide');
                $('#deleteModal').modal('hide');
            }
        },
        created() {
            this.getProducts();
        },
    }
</script>