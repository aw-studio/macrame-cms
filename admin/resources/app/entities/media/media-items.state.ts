import { loadMediaItems } from './api';
import { Media } from '@/types';
import { useState } from '@macramejs/macrame-vue3';

const mediaItemsState = useState<Media[]>(undefined, {
    load: () => loadMediaItems(),
});

export { mediaItemsState };
