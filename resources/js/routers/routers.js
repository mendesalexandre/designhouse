import Vue from 'vue';
import VueRouter from 'vue-router';

import App from '../components/frontend/app/App';
import Bookables from '../components/frontend/bookables/Bookables';
import Appointments from '../components/frontend/appointments/Appointments';
import Home from '../components/frontend/home/Home';
import Admin from '../components/frontend/admin/Admin';
import Login from '../components/frontend/login/Login';
import Custas from '../components/adm/TabelaCustas';
import NotFound from '../components/frontend/notfound/NotFound';

Vue.use(VueRouter);

const routes = [
    {
        path: '/app',
        component: App,
        children:
            [
                { path: 'home', component: Home, name: 'home' },
                { path: 'bookables', component: Bookables, name: 'bookables' },
                { path: 'agendamentos', component: Appointments, name: 'appointments' },
                { path: 'tabela-custas', component: Custas, name: 'custas' },
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