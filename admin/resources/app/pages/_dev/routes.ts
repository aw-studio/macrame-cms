import { RouteRecordRaw } from 'vue-router';

const routes: RouteRecordRaw[] = [
    {
        path: 'dev',
        component: () => import('./layouts/DevLayout.vue'),
        children: [
            {
                path: '',
                component: () => import('./Dev.vue'),
            },
            {
                path: 'buttons',
                component: () => import('./Buttons.vue'),
            },
            {
                path: 'form',
                component: () => import('./Form.vue'),
            },
            {
                path: 'icons',
                component: () => import('./Icons.vue'),
            },
            {
                path: 'table',
                component: () => import('./Table.vue'),
            },
            {
                path: 'tree',
                component: () => import('./Tree.vue'),
            },
        ],
    },
];

export { routes };
