import { RouteRecordRaw } from 'vue-router';

import Show from './Show.vue';

const routes: RouteRecordRaw[] = [
    {
        path: '/menus',
        component: () => import('./layouts/MenusLayout.vue'),
        children: [
            { path: '', component: () => import('./Index.vue') },
            {
                path: ':menu',
                component: () => import('./layouts/MenuLayout.vue'),
                children: [{ path: '', component: () => import('./Show.vue') }],
            },
        ],
    },
];

export { routes };
