import { RouteRecordRaw } from 'vue-router';

const routes: RouteRecordRaw[] = [
    {
        path: 'pages',
        component: () => import('./layouts/PagesLayout.vue'),
        children: [
            { path: '', component: () => import('./Index.vue') },
            {
                path: 'edit/:page',
                component: () => import('./layouts/PageLayout.vue'),
                children: [
                    {
                        path: '',
                        component: () => import('./Content.vue'),
                    },
                    {
                        path: 'meta',
                        component: () => import('./Meta.vue'),
                    },
                    {
                        path: 'settings',
                        component: () => import('./Settings.vue'),
                    },
                    {
                        path: 'audits',
                        component: () => import('./Audits.vue'),
                    },
                ],
            },
        ],
    },
];

export { routes };
