import { RouteRecordRaw } from 'vue-router';

const routes: RouteRecordRaw[] = [
    {
        path: 'redirects',
        component: () => import('../../layout/Wrapper.vue'),
        children: [{ path: '', component: () => import('./Index.vue') }],
    },
];

export { routes };
