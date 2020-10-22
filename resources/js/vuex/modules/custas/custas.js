export default {
    state: {
        items: {
            data: []
        }
    },
    mutations: {
        LOAD_CUSTAS(state, custas) {
            state.items = custas
        }
    },
    actions: {
        loadCustas(context) {
            axios
                .get("/api/v1/custas")
                .then((response) => {
                    context.commit('LOAD_CUSTAS', response.data)
                })
                .catch((error) => { });
        },
    },

    getters: {
    }
}