import { RouteRecordRaw } from 'vue-router';

const routes: RouteRecordRaw[] = [
    {
        path: 'announcements',
        component: () => import('../../layout/Wrapper.vue'),
        children: [
            { path: '', component: () => import('./Index.vue') },
            {
                path: ':announcement',
                component: () => import('./Show.vue'),
            },
        ],
    },
];

export { routes };
