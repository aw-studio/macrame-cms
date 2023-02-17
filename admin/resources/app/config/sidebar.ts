import { SidebarSection } from '@/layout/types';
import IconPage from '@/ui/Icons/IconPage.vue';
import IconMediaImageFolder from '@/ui/Icons/IconMediaImageFolder.vue';
import IconList from '@/ui/Icons/IconList.vue';
import IconSettings from '@/ui/Icons/IconSettings.vue';
import IconReportColumns from '@/ui/Icons/IconReportColumns.vue';
import IconLayoutLeft from '@/ui/Icons/IconLayoutLeft.vue';
import IconRssFeed from '@/ui/Icons/IconRssFeed.vue';
import IconCalendarVue from '@/ui/Icons/IconCalendar.vue';
import IconGroup from '@/ui/Icons/IconGroup.vue';
import { isAdmin } from '@/entities';
import { useI18n } from 'vue-i18n';
import app from './app';

const useSidebarPrimarySections: () => SidebarSection[] = () => {
    const { t } = useI18n();

    return [
        {
            title: `CMS`,
            items: [
                {
                    title: t('layout.pages'),
                    to: '/pages',
                    icon: IconPage,
                    show: true,
                },
                {
                    title: t('layout.media'),
                    to: '/media',
                    icon: IconMediaImageFolder,
                    show: true,
                },
                {
                    title: t('layout.navigations'),
                    to: '/menus',
                    icon: IconList,
                    show: true,
                },
                {
                    title: t('layout.blocks'),
                    to: '/blocks',
                    icon: IconReportColumns,
                    show: app.features.blocks,
                },
                {
                    title: t('layout.sections'),
                    to: '/partials',
                    icon: IconLayoutLeft,
                    show: isAdmin.value,
                },
                {
                    title: t('layout.website_settings'),
                    to: '/app-settings',
                    icon: IconSettings,
                    show: isAdmin.value,
                },
            ],
        },
        {
            title: 'Crud',
            items: [
                {
                    title: t('layout.posts'),
                    to: '/posts',
                    icon: IconRssFeed,
                    show: app.features.posts,
                },
                {
                    title: t('layout.events'),
                    to: '/events',
                    icon: IconCalendarVue,
                    show: app.features.events,
                },
                {
                    title: 'Personen',
                    to: '/people',
                    icon: IconGroup,
                    show: isAdmin.value && app.features.people
                },
            ],
        },
    ];
};

export default { useSidebarPrimarySections };
