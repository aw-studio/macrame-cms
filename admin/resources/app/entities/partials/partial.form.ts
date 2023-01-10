import { useForm } from '@macramejs/macrame-vue3';
import { loadPartial, updatePartial } from './api';
import { PartialForm } from '@/types';

export type UsePartialForm = () => PartialForm;

const usePartialForm: UsePartialForm = () => {
    return useForm({
        data: { 
            name: '', 
            attributes: {}
        },
        submit: (data, id) => updatePartial(data, id),
        load: template => loadPartial(template)
    });
};

const partialForm = usePartialForm();

export { usePartialForm, partialForm };
