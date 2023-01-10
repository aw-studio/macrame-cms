import { RouteRecordRaw } from 'vue-router';

const routes: RouteRecordRaw[] = [
    {
        path: 'blocks',
        component: () => import('./layouts/BlocksLayout.vue'),
        children: [
            { path: '', component: () => import('./Index.vue') },
            {
                path: ':block',
                component: () => import('./layouts/BlockLayout.vue'),
                children: [
                    {
                        path: '',
                        component: () => import('./Show.vue'),
                    },
                ],
            },
        ],
    },
];

export { routes };
