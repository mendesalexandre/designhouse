import Vue from 'vue';
import VueRouter from 'vue-router';

// SITE
import SiteHome from '../components/frontend/site/Home';

import App from '../components/frontend/app/App';
import Bookables from '../components/frontend/bookables/Bookables';
import Appointments from '../components/frontend/appointments/Appointments';
import Home from '../components/frontend/home/Home';
import Admin from '../components/frontend/admin/Admin';
import Login from '../components/frontend/login/Login';
import Custas from '../components/adm/TabelaCustas';
import EditCustasModal from '../components/adm/custas/modal/EditCustasModal';
import Cliente from '../components/frontend/cliente/Cliente';
import ClienteEdit from '../components/frontend/cliente/ClienteEdit';


import NotFound from '../components/frontend/notfound/NotFound';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        component: SiteHome,
    },
    {
        path: '/app',
        component: App,
        children:
            [
                { path: 'home', component: Home, name: 'home' },
                { path: 'bookables', component: Bookables, name: 'bookables' },
                { path: 'agendamentos', component: Appointments, name: 'appointments' },
                { path: 'tabela-custas', component: Custas, name: 'custas' },
                { path: 'custas/:id/editar', component: EditCustasModal, name: 'custas.edit', props: true },

                { path: 'cliente', component: Cliente, name: 'cliente.index' },
                { path: 'cliente/:id/editar', component: ClienteEdit, name: 'cliente.edit' }
            ]
    },
    {
        path: '/admin',
        component: Admin,
        name: 'admin'
    },
    {
        path: '/login',
        component: Login,
        name: 'login'
    },


    {
        path: '*',
        component: NotFound,
    }
];

const router = new VueRouter({
    // mode: 'history',
    routes
});

export default router;