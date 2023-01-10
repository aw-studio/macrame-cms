import { RouteRecordRaw } from 'vue-router';

const routes: RouteRecordRaw[] = [
    {
        path: 'app-settings',
        component: () => import('./layouts/AppSettingsLayout.vue'),
        children: [
            { path: '', component: () => import('./Index.vue') },
            {
                path: 'redirects',
                component: () => import('../redirects/Index.vue'),
            },
        ],
    },
];

export { routes };
