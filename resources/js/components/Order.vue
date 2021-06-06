<template>
    <div class="order-wrapper">
        <div class="order-display">
            <div class="order-display-item">
                {{ order.id }}
            </div>
            <div class="order-display-item">
                {{ order.technician.last_name }}, {{ order.technician.first_name }}
            </div>
            <div class="order-display-item">
                {{ order.key.name }}
            </div>
        </div>
        <div class="order-options">
            <button
                type="button"
                class="update-button"
                @click="handleUpdateClick"
            >
                Update
            </button>
            <button
                type="button"
                class="delete-button"
                @click="handleDeleteClick"
            >
                Delete
            </button>
        </div>

    </div>
</template>

<script>
    export default {
        name: 'Order',
        props: {
           order: {
                type: Object,
                default: () => {}
            },
        },
        methods : {
            /**
             * emit update click
             */
            handleUpdateClick () {
                this.$emit('updateOrder', this.order);
            },
            /**
             * emit delete click
             */
            handleDeleteClick () {
                this.$emit('deleteOrder', this.order)
            }
        }
    }
</script>
