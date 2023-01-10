import { Page } from '@/types';
import { useIndex } from '@macramejs/macrame-vue3';
import { loadPages } from './api';

type PageIndexSortByKeys = 'id';

const usePagesIndex = () => {
    return useIndex<Page, PageIndexSortByKeys>({
        load: params => loadPages(params),
    });
};

export { usePagesIndex };
