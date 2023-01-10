import { RouteRecordRaw } from 'vue-router';

const routes: RouteRecordRaw[] = [
    {
        path: 'events',
        component: () => import('../../layout/Wrapper.vue'),
        children: [
            { path: '', component: () => import('./Index.vue') },
            {
                path: ':event',
                component: () => import('./Show.vue'),
            },
        ],
    },
];

export { routes };
