import { MenuForm, MenuFormData } from '@/types';
import { useForm } from '@macramejs/macrame-vue3';
import { updateOrCreateMenu } from './api';
import { menusState } from './menus.state';

export type UseMenuForm = (
    data: Partial<MenuFormData> & { id?: number }
) => MenuForm;

export const useMenuForm: UseMenuForm = ({ title = '', id = undefined }) => {
    const form = useForm({
        data: { title },
        submit: data =>
            updateOrCreateMenu(data, id).then(response => {
                menusState.load();

                return response;
            }),
    });

    return form;
};
