import { RouteRecordRaw } from 'vue-router';

const routes: RouteRecordRaw[] = [
    {
        path: 'system',
        component: () => import('./layouts/SystemIndexLayout.vue'),
        children: [
            {
                path: '',
                component: () => import('./Index.vue'),
            },
            {
                path: 'users',
                component: () => import('../../layout/Wrapper.vue'),
                children: [
                    { path: '', component: () => import('./SystemUsers.vue') },
                    {
                        path: ':user',
                        component: () => import('./SystemUser.vue'),
                    },
                ],
            },
            {
                path: 'settings',
                component: () => import('../../layout/Wrapper.vue'),
                children: [
                    { path: '', component: () => import('./Settings.vue') },
                ],
            },
        ],
    },
];

export { routes };
