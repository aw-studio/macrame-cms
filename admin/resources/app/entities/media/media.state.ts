import { loadMediaItem } from './api';
import { Media } from '@/types';
import { useState } from '@macramejs/macrame-vue3';

const mediaState = useState<Media, [number]>(undefined, {
    load: id => loadMediaItem(id),
});

export { mediaState };
