import { RouteRecordRaw } from 'vue-router';

const routes: RouteRecordRaw[] = [
    {
        path: 'people',
        component: () => import('../../layout/Wrapper.vue'),
        children: [
            { path: '', component: () => import('./Index.vue') },
            {
                path: ':person',
                component: () => import('./Show.vue'),
            },
        ],
    },
];

export { routes };
