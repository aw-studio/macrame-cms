import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router';
import { auth } from './middleware/auth';

import { routes as devRoutes } from '@/pages/_dev/routes';
import { routes as authRoutes } from '@/pages/auth/routes';
import { routes as homeRoutes } from '@/pages/home/routes';
import { routes as mediaRoutes } from '@/pages/media/routes';
import { routes as menuRoutes } from '@/pages/menus/routes';
import { routes as pagesRoutes } from '@/pages/pages/routes';
import { routes as blocksRoutes } from '@/pages/blocks/routes';
import { routes as partialsRoutes } from '@/pages/partials/routes';
import { routes as appSettingsRoutes } from '@/pages/app-settings/routes';
import { routes as announcementRoutes } from '@/pages/announcements/routes';
import { routes as peopleRoutes } from '@/pages/people/routes';
import { routes as eventRoutes } from '@/pages/events/routes';
import { routes as redirectRoutes } from '@/pages/redirects/routes';
import { routes as systemRoutes } from '@/pages/system/routes';

const routes: RouteRecordRaw[] = [
    // guest
    ...authRoutes,
    // authed
    {
        path: '/',
        component: () => import('@/layout/AppRouterView.vue'),
        meta: {
            middleware: [auth],
        },
        children: [
            // dev
            ...devRoutes,
            ...homeRoutes,
            ...mediaRoutes,
            ...menuRoutes,
            ...pagesRoutes,
            ...blocksRoutes,
            ...partialsRoutes,
            ...appSettingsRoutes,
            ...announcementRoutes,
            ...eventRoutes,
            ...peopleRoutes,
            ...redirectRoutes,
            ...systemRoutes,
        ],
    },
];

const router = createRouter({
    history: createWebHistory('/admin'),
    routes,
});

const nextFactory = (context: any, middleware: any, index: any) => {
    const subsequentMiddleware = middleware[index];
    if (!subsequentMiddleware) return context.next;

    return (...parameters: any) => {
        context.next(...parameters);
        const nextMiddleware = nextFactory(context, middleware, index);
        subsequentMiddleware({ ...context, next: nextMiddleware });
    };
};

router.beforeEach((to, from, next) => {
    if (to.meta.middleware) {
        const middleware = Array.isArray(to.meta.middleware)
            ? to.meta.middleware
            : [to.meta.middleware];

        const context = {
            from,
            next,
            router,
            to,
        };
        const nextMiddleware = nextFactory(context, middleware, 1);

        return middleware[0]({ ...context, next: nextMiddleware });
    }

    return next();
});

export { router };
