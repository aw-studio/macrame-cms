import { RouteRecordRaw } from 'vue-router';

const routes: RouteRecordRaw[] = [
    {
        path: 'posts',
        component: () => import('../../layout/Wrapper.vue'),
        children: [
            { path: '', component: () => import('./Index.vue') },
            {
                path: ':post',
                component: () => import('./Show.vue'),
            },
        ],
    },
];

export { routes };
