export default {
    func: {
        /**
         * get all the keys
         * @returns Response
         */
        fetchKeys () {
            let url = '/api/keys'

            return axios.get(url)
            .then((response) => {
                return {
                    response: response.data
                }
            })
            .catch(error => {
                console.log('fetching keys error');
                console.log(error);
            });
        },
        /**
         * get all the techs
         * @returns Response
         */
        fetchTechnicians () {
            let url = '/api/technicians'

            return axios.get(url)
            .then((response) => {
                return {
                    response: response.data
                }
            })
            .catch(error => {
                console.log('fetching techs error');
                console.log(error);
            });
        },
        /**
         * Fetch orders index
         * @returns Response
         */
        fetchOrders () {
            let url = '/api/orders'

            return axios.get(url)
            .then((response) => {
                return {
                    response: response.data
                }
            })
            .catch(error => {
                console.log('fetching orders error');
                console.log(error);
            });
        },
        /**
         * Delete an Order
         * @param {String} orderId
         * @returns Response
         */
        deleteOrder (orderId) {
            let url = '/api/orders/' + orderId

            return axios.delete(url)
            .then((response) => {
                return {
                    response: response.data
                }
            })
            .catch(error => {
                console.log('deleting order error');
                console.log(error);
            });
        },
        /**
         * Create a new Order
         * @param {Object} values
         * @returns Response
         */
        createNewOrder (values) {
            let url = '/api/orders'

            return axios.post(url, {
                'key_id': values.key.id,
                'technician_id': values.technician.id
            })
            .then((response) => {
                return {
                    response: response.data
                }
            })
            .catch(error => {
                console.log('creating order error');
                console.log(error);
            });
        },
        /**
         * Update an existing order
         * @param {Object} values
         * @returns Response
         */
        updateExistingOrder (values) {
            let url = '/api/orders/' + values.order.id

            return axios.put(url, {
                'key_id': values.key.id,
                'technician_id': values.technician.id
            })
            .then((response) => {
                return {
                    response: response.data
                }
            })
            .catch(error => {
                console.log('updating order error');
                console.log(error);
            });
        },
    }
}
