import { menuItemTree } from '@/entities';
import { Menu, MenuItemForm, MenuItemFormData } from '@/types';
import { useForm } from '@macramejs/macrame-vue3';
import { updateOrCreateMenuItem } from './api';

export type UseMenuItemForm = (
    menu: Menu,
    data: Partial<MenuItemFormData> & { id?: number }
) => MenuItemForm;

export const useMenuItemForm: UseMenuItemForm = (
    menu,
    { title = '', link = '', id = undefined }
) => {
    const form = useForm({
        data: { title, link },
        submit: data =>
            updateOrCreateMenuItem(menu, data, id).then(response => {
                menuItemTree.value.load();

                return response;
            }),
    });

    return form;
};
