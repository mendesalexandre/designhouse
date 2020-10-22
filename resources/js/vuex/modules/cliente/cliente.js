// export default {
//     state: {
//         cliente: {
//             data: []
//         }
//     },
//     mutations: {
//         STORE_CLIENTE(state, cliente) {
//             state.cliente = cliente;
//         }
//     },
//     actions: {
//         storeCliente(context, params) {
//             axios.post("/api/v1/cliente/store", params)
//                 .then(reponse => {
//                     console.log(response);
//                 })
//                 .catch(error => {
//                     console.log(error)
//                 })
//                 .finally()
//         }
//     },
//     getters: {}
// }