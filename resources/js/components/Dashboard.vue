<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div id="header-row">
                            <span>
                                Orders
                            </span>
                            <span>
                                <button
                                    type="button"
                                    id="add-button"
                                    @click="handleAddNewOrder"
                                >
                                    Add New Order
                                </button>
                            </span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div
                            v-for="order in orders"
                            :key="order.id"
                            v-show = "!editing && !adding"
                        >
                            <order
                                :order="order"
                                @updateOrder="switchToUpdate"
                                @deleteOrder="deleteOrder"
                            >
                            </order>
                        </div>
                        <div
                            v-show = "editing || adding"
                        >
                            <orderForm
                                :order="selectedOrder"
                                :techs="technicians"
                                :keys="keys"
                                @cancelEdit="cancelEdit"
                                @updateOrder="updateOrderFormSubmit"
                                @createNewOrder="createOrderFormSubmit"
                            >
                            </orderForm>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import requests from '../requests';
    import order from './Order.vue';
    import orderForm from './OrderForm.vue';
    export default {
        name: 'Dashboard',
        components: {
            order,
            orderForm
        },
        data() {
            return {
                keys: [],
                technicians: [],
                orders: [],
                adding: false,
                editing: false,
                selectedOrder: {},
            }
        },
        methods : {
            /**
             * fetch keys
             */
            getTheKeys () {
                requests.func.fetchKeys()
                .then(response => {
                        this.keys = [];
                        this.keys = response.response;
                    }
                )
            },
            /**
             * fetch techs
             */
            getTheTechs () {
                requests.func.fetchTechnicians()
                .then(response => {
                        this.technicians = [];
                        this.technicians = response.response;
                    }
                )
            },
            /**
             * get all orders
             */
            getTheOrders () {
                requests.func.fetchOrders()
                .then(response => {
                        this.orders = [];
                        this.orders = response.response;
                    }
                )
            },
            /**
             * delete an order
             */
            deleteOrder(order) {
                requests.func.deleteOrder(order.id)
                .then(response => {
                        console.log('order deleted');
                        this.getTheOrders();
                    }
                )
            },
            /**
             * switch over to update
             */
            switchToUpdate (order) {
                this.selectedOrder = order;
                this.editing = true;
            },
            /**
             * cancel adding or editing
             */
            cancelEdit () {
                this.selectedOrder = {};
                this.editing = false;
                this.adding = false;
            },
            /**
             * switch to adding form
             */
            handleAddNewOrder () {
                this.selectedOrder = {};
                this.adding = true;
            },
            /**
             * submit update of order
             */
            updateOrderFormSubmit (values) {
                this.selectedOrder = {};
                this.editing = false;
                this.adding = false;
                requests.func.updateExistingOrder(values)
                .then(response => {
                        console.log('order updated');
                        this.getTheOrders();
                    }
                )
            },
            /**
             * submit creating of new order
             */
            createOrderFormSubmit (values) {
                console.log('new submitr');
                this.selectedOrder = {};
                this.editing = false;
                this.adding = false;
                requests.func.createNewOrder(values)
                .then(response => {
                        console.log('order created');
                        this.getTheOrders();
                    }
                )
            }
        },
        mounted() {
            this.getTheKeys();
            this.getTheTechs();
            this.getTheOrders();
        }
    }
</script>
<style>
</style
