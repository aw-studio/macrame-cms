import { RouteRecordRaw } from 'vue-router';

const routes: RouteRecordRaw[] = [
    {
        path: 'partials',
        component: () => import('./layouts/PartialsLayout.vue'),
        children: [
            { path: '', component: () => import('./Index.vue') },
            {
                path: ':partial',
                component: () => import('./layouts/PartialLayout.vue'),
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
