import { useIndex } from '@macramejs/macrame-vue3';
import { Post } from '@/types';
import { loadPosts } from './api';
import { reactive } from 'vue';

export const usePostIndex = () => {
    const defaultFilter = reactive({
        value: [],
    });
    const districtAssociationFilter = reactive({
        value: [],
    });
    const featuredFilter = reactive({
        value: [],
    });

    const index = useIndex<Post>({
        load: params => {
            // console.log(params)
            return loadPosts(params);
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

export const postIndex = usePostIndex();

export const usePressPostIndex = () => {
    const pressFilter = reactive({
        value: ['press'],
    });

    const districtAssociationFilter = reactive({
        value: [],
    });

    const index = useIndex<Post>({
        load: params => {
            return loadPosts(params);
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

export const pressPostIndex = usePressPostIndex();
