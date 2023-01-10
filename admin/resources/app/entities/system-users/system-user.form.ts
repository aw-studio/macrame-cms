import { useForm } from '@macramejs/macrame-vue3';
import { loadSystemUser, updateOrCreateSystemUser } from './api';
import { SystemUser, SystemUserForm } from '@/types';

import { ref } from 'vue';

export type UseSystemUserForm = () => SystemUserForm;

export const SystemUserModel = ref<SystemUser>();

// TODO: false type problem
const useSystemUserForm = () => {
    return useForm({
        data: {
            name: '',
            email: '',
            password: '',
            is_admin: false,
        },
        submit: (data, id) => updateOrCreateSystemUser(data, id),
        load: id => loadSystemUser(id),
    });
};

const systemUserForm = useSystemUserForm();

export { useSystemUserForm, systemUserForm };
