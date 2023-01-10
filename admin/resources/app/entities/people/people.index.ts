import { useIndex } from '@macramejs/macrame-vue3';
import { Person } from '@/types';
import { loadPeople } from './api';

export const usePeopleIndex = () => {
    const index = useIndex<Person>({
        load: params => {
            return loadPeople(params);
        },
    });

    index.reloadOnChange(index.filters);

    return index;
};

export const peopleIndex = usePeopleIndex();
