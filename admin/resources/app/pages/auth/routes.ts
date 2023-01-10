import { guest } from '@/plugins/middleware/auth';
import { RouteRecordRaw } from 'vue-router';

const routes: RouteRecordRaw[] = [
    {
        path: '/login',
        component: () => import('./Login.vue'),
        meta: {
            middleware: [guest],
        },
    },
    {
        path: '/forgot',
        component: () => import('./ForgotPassword.vue'),
    },
    {
        path: '/reset-password',
        component: () => import('./ResetPassword.vue'),
    },
];

export { routes };

