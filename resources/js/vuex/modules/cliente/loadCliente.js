import axios from 'axios';
export default {
    state: {
        clientes: {
            data: []
        }
    },
    mutations: {
        LOAD_CLIENTES(state, clientes) {
            state.clientes = clientes;
        }
    },

    actions: {
        loadClientes(context) {
            axios.get('/api/v1/clientes')
                .then(response => {
                    context.commit('LOAD_CLIENTES', response.data)
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}