<template>
    <div class="form-wrapper">
        <div>
            <span v-show="Object.keys(order).length === 0">
                Add Order
            </span>
            <span v-show="Object.keys(order).length !== 0">
                Update Order
            </span>
        </div>
        <div class="form-fields-wrapper">
            <div class="form-fields-display">
                <div>
                    <div>
                        KEY
                    </div>
                    <select v-model="key">
                        <option
                            v-for="akey in keys"
                            :value="akey"
                            v-bind:key="akey.id"
                        >
                            {{akey.name}}
                        </option>
                    </select>
                </div>
                <div>
                    <div>
                        TECHNICIAN
                    </div>
                    <select v-model="technician">
                        <option
                            v-for="tech in techs"
                            :value="tech"
                            v-bind:key="tech.id"
                        >
                            {{tech.last_name}}, {{tech.first_name}}
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-options">
                <button
                    type="button"
                    class="update-button"
                    @click="handleSubmit"
                >
                    Submit
                </button>
                <button
                    type="button"
                    class="delete-button"
                    @click="handleCancel"
                >
                    Cancel
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'OrderForm',
        props: {
           order: {
                type: Object,
                default: () => {}
            },
            keys: {
                type: Array,
                default: () => []
            },
            techs: {
                type: Array,
                default: () => []
            }
        },
        data() {
            return {
                key: {},
                technician: {},
            }
        },
        methods : {
            /**
             * emit data for submission
             */
            handleSubmit () {
                if (Object.keys(this.order).length === 0) {
                    this.$emit('createNewOrder', {'key': this.key, 'technician': this.technician});
                    return;
                }
                this.$emit('updateOrder', {'order': this.order, 'key': this.key, 'technician': this.technician});
            },
            /**
             * emit cancle signal
             */
            handleCancel () {
                this.$emit('cancelEdit', this.order)
            }
        },
        watch: {
            order: function(newVal, oldVal) {
                if (this.order.key_id) {
                    this.key = this.keys.find(o => o.id === newVal.key_id);
                } else {
                    this.key = {};
                }
                if (this.order.technician_id) {
                    this.technician = this.techs.find(o => o.id === newVal.technician_id);
                } else {
                    this.technician = {};
                }
            }
        }
}
</script>
