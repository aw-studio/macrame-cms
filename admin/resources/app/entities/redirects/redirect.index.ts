import { useIndex } from '@macramejs/macrame-vue3';
import { Redirect } from '@/types';
import { loadRedirects } from './api';
import { reactive } from 'vue';

export const useRedirectIndex = () => {

    const index = useIndex<Redirect>({
        load: params => {
            return loadRedirects(params);
        },
        sortBy: [
            {
                key: 'id',
                direction: 'desc',
            },
        ],
        filters: {},

    });

    index.reloadOnChange(index.filters);

    return index;
};

export const redirectIndex = useRedirectIndex();
