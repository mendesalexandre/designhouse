export default {
    state: {
        loading: false
    },
    mutations: {
        CHANGE_PRELOAD(state, status) {
            state.loading = status;
        }
    }
}