// import { IconList } from '@/ui';
// import { IconPages } from '@/ui';
// import { IconMediaImageFolder } from '@/ui';
// import { IconDashboard } from '@/ui';
import IconSettings from '@/ui/Icons/IconSettings.vue';
import { isAdmin } from '@/entities';

import { RouterLinkProps } from 'vue-router';

type SidebarNavigationLink = {
    title: string;
    href?: string;
    icon?: string;
    link?: RouterLinkProps;
};

export const sidebarLinks: SidebarNavigationLink[] = [
    {
        title: 'Dashboard',
        link: { to: '/' },
        // icon: IconDashboard,
    },
];

// Media links
sidebarLinks.push({
    title: 'Medien',
    link: { to: '/media' },
    // icon: IconMediaImageFolder,
});

// Pages links
sidebarLinks.push({
    title: 'Seiten',
    link: { to: '/pages' },
    // icon: IconPages
});

// Navigation links
sidebarLinks.push({
    title: 'Navigation',
    href: '/admin/nav',
    // icon: IconList,
});
