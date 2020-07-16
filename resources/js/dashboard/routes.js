import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './views/Home.vue';
import Programmes from './views/admin/Programmes.vue';
import ProgrammesClient from './views/client/Programmes.vue';
import Salle from './views/gerant/Salle.vue';
import Login from './login/Login.vue';
import { Role } from './_helpers/role.js';
import { authenticationService } from '../dashboard/_services/authentication.service'
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [{
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/coach/programmes/:id',
        name: 'programmes',
        component: Programmes,
        meta: { authorize: [Role.Coach] }
    },
    {
        path: '/client/programmes',
        name: 'programmeclient',
        component: ProgrammesClient,
        meta: { authorize: [Role.Client] }
    },

    {
        path: '/gerant/salle/:id',
        name: 'salle',
        component: Salle,
        meta: { authorize: [Role.Gerant] }
    },
    ]
})

router.beforeEach((to, from, next) => {

    // redirect to login page if not logged in and trying to access a restricted page
    const { authorize } = to.meta;

    if (authorize && !_.isEmpty(authorize)) {

        const currentUser = authenticationService.currentUserValue;

        if (!currentUser) {
            // not logged in so redirect to login page with the return url
            return next({ path: "/login", query: { returnUrl: to.path } });
        }

        // check if route is restricted by role
        if (authorize.length && !authorize.includes(currentUser.role.name)) {
            // role not authorised so redirect to home page
            return next({ path: "/" });
        }

    }

    return next();
});


export default router;