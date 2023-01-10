import { useIndex } from '@macramejs/macrame-vue3';
import { Media } from '@/types/resources';
import { reactive, ref, watch } from 'vue';
import { loadMediaItems } from './api';

type MediaIndexSortByKeys = 'id';

type MediaIndexCollectionFilter = {
    update(collection: { key: string }): void;
    value: null | string;
};
type MediaIndexTypesFilter = {
    toggle(type: string): void;
    value: string[];
};
type MediaIndexFilters = {
    collection: MediaIndexCollectionFilter;
    types: MediaIndexTypesFilter;
};

// TODO: macrame backport
export const mediaIndexIsLoaded = ref(false);

export const useMediaIndex = () => {
    const collectionFilter = reactive<MediaIndexCollectionFilter>({
        update(collection) {
            this.value = collection ? collection.key : null;
        },
        value: null,
    });

    const typesFilter = reactive<MediaIndexTypesFilter>({
        toggle(type) {
            const i = this.value.indexOf(type);
            if (i !== -1) this.value.splice(i, 1);
            else this.value.push(type);
        },
        value: [],
    });

    const index = useIndex<Media, MediaIndexSortByKeys, MediaIndexFilters>({
        load: async params => {
            // TODO: macrame backport
            mediaIndexIsLoaded.value = false;

            let re = await loadMediaItems(params);

            mediaIndexIsLoaded.value = true;

            return re;
        },
        filters: {
            collection: collectionFilter,
            types: typesFilter,
        },
    });

    // TODO: check why? this toggles a second load of the index…
    // index.reloadOnChange(index.filters);

    return index;
};

export const mediaIndex = useMediaIndex();
