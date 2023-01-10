import { useIndex } from '@macramejs/macrame-vue3';
import { Event } from '@/types';
import { loadEvents } from './api';
import { reactive } from 'vue';

export const useEventIndex = () => {
    const index = useIndex<Event>({
        load: params => {
            return loadEvents(params);
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

export const eventIndex = useEventIndex();
