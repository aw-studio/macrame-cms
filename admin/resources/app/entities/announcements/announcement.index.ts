import { useIndex } from '@macramejs/macrame-vue3';
import { Announcement } from '@/types';
import { loadAnnouncements } from './api';
import { reactive } from 'vue';

export const useAnnouncementIndex = () => {
    const defaultFilter = reactive({
        value: [],
    });
    const districtAssociationFilter = reactive({
        value: [],
    });
    const featuredFilter = reactive({
        value: [],
    });

    const index = useIndex<Announcement>({
        load: params => {
            // console.log(params)
            return loadAnnouncements(params);
        },
        sortBy: [
            {
                key: 'id',
                direction: 'desc',
            },
        ],
        filters: {
            default: defaultFilter,
            district_association: districtAssociationFilter,
            featured: featuredFilter,
        },
    });

    index.reloadOnChange(index.filters);

    return index;
};

export const announcementIndex = useAnnouncementIndex();

export const usePressAnnouncementIndex = () => {
    const pressFilter = reactive({
        value: ['press'],
    });

    const districtAssociationFilter = reactive({
        value: [],
    });

    const index = useIndex<Announcement>({
        load: params => {
            return loadAnnouncements(params);
        },
        sortBy: [
            {
                key: 'id',
                direction: 'desc',
            },
        ],
        filters: {
            press: pressFilter,
            district_association: districtAssociationFilter,
        },
    });

    index.reloadOnChange(index.filters);

    return index;
};

export const pressAnnouncementIndex = usePressAnnouncementIndex();
