import { useIndex } from '@macramejs/macrame-vue3';
import { MediaCollection } from '@/types';
import { loadMediaCollections } from './api';

import { ref } from 'vue';
type MediaCollectionIndexSortByKeys = 'id';

export const mediaCollectionIndexIsLoaded = ref(false);

export const useMediaCollectionIndex = () => {
    const index = useIndex<MediaCollection, MediaCollectionIndexSortByKeys>({
        load: async params => {
            // TODO: macrame backport
            mediaCollectionIndexIsLoaded.value = false;

            let re = await loadMediaCollections(params);

            mediaCollectionIndexIsLoaded.value = true;

            return re;
        },
    });

    index.reloadOnChange(index.filters);

    return index;
};

export const mediaCollectionIndex = useMediaCollectionIndex();
