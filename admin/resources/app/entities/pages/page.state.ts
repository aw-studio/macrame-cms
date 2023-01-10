import { loadPage } from './api';
import { Page } from '@/types';
import { useState } from '@macramejs/macrame-vue3';

const pageState = useState<Page, [number]>(undefined, {
    load: id => loadPage(id),
});

export { pageState };
