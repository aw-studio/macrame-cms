import { Menu, MenuItem, MenuItemFormData } from '@/types';
import {
    client,
    LoadMany,
    UpdateOrCreate,
    Delete,
    Update,
} from '@/modules/api';
import { TreeOrder, TreeResource } from '@macramejs/macrame-vue3';

const updateOrCreateMenuItem: UpdateOrCreate<MenuItemFormData, [Menu]> = (
    menu,
    data,
    id = undefined
) =>
    id
        ? client.put(`menus/${menu.id}/items/${id}`, data)
        : client.post(`menus/${menu.id}/items`, data);

const deleteMenuItem: Delete<[Menu]> = (menu, id) =>
    client.delete(`menus/${menu.id}/items/${id}`);

// tree

const loadMenuItemTree: LoadMany<TreeResource<MenuItem>, [Menu]> = menu =>
    client.get(`menus/${menu.id}/item-tree`);

const updateMenuItemTree: Update<{ order: TreeOrder }, [Menu]> = (menu, data) =>
    client.put(`menus/${menu.id}/item-tree`, data);

export {
    loadMenuItemTree,
    updateMenuItemTree,
    updateOrCreateMenuItem,
    deleteMenuItem,
};
