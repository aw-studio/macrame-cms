import { useForm } from '@macramejs/macrame-vue3';
import { loadPerson, updateOrCreatePerson } from './api';
import { Person, PersonForm } from '@/types';

import { ref } from 'vue';

export type UsePersonForm = () => PersonForm;

export const personModel = ref<Person>();

const usePersonForm: UsePersonForm = () => {
    return useForm({
        data: {
            name: '',
            description: '',
            email: '',
            phone: '',
            image: {
                id: 0,
                title: '',
                alt: '',
            },
        },
        submit: (data, id) => updateOrCreatePerson(data, id),
        load: id => loadPerson(id),
    });
};

const personForm = usePersonForm();

export { usePersonForm, personForm };
