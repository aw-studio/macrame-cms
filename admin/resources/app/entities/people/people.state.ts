import { Person } from '@/types';
import { useState } from '@macramejs/macrame-vue3';
import { loadPeople } from './api';

export const peopleState = useState<Person[]>([], {
    load: () => loadPeople({
        perPage: -1
    }),
});
