import Vue from 'vue';
import Vuex from 'vuex';

import Preloader from './modules/preloader/loading';
import Custas from './modules/custas/custas';
import Cliente from './modules/cliente/cliente';
import loadCliente from './modules/cliente/loadCliente';

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        custas: Custas,
        cliente: Cliente,
        loadCliente: loadCliente,
        preloader: Preloader
    }
});

export default store;