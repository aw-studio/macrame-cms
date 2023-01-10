import { RouteRecordRaw } from 'vue-router';

const routes: RouteRecordRaw[] = [
    {
        path: '/media',
        component: () => import('./layouts/MediaLayout.vue'),
        children: [
            {
                path: '',
                component: () => import('./Index.vue'),
            },
            {
                path: ':collection',
                component: () => import('./Index.vue'),
            },
        ],
    },
];

export { routes };
