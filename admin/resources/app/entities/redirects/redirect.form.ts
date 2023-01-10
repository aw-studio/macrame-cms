import { useForm } from '@macramejs/macrame-vue3';
import { loadRedirect, updateOrCreateRedirect } from './api';
import { RedirectForm } from '@/types';

export type UseRedirectForm = () => RedirectForm;

// TODO: type
const useRedirectForm = () => {
    return useForm({
        data: {
            from_url: '',
            to_url: '',
            http_status_code: 301,
            active: true,
        },
        submit: (data, id) => updateOrCreateRedirect(data, id),
        load: id => loadRedirect(id),
        transform: data => {
            return {
                ...data,
            };
        },
    });
};

const redirectForm = useRedirectForm();

export { useRedirectForm, redirectForm };
