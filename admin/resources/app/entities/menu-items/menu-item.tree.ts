import { Menu, MenuItem, MenuItemTreeResource } from '@/types';
import { Tree, useTree } from '@macramejs/macrame-vue3';
import { ref, Ref } from 'vue';
import { loadMenuItemTree } from './api';

export type UseMenuItemTree = (
    menu: Menu
) => Tree<MenuItem, MenuItemTreeResource>;

export const useMenuItemTree: UseMenuItemTree = (menu: Menu) => {
    const tree = useTree<MenuItem>({
        load: () => loadMenuItemTree(menu),
    });

    return tree;
};

export const menuItemTree = ref() as Ref<Tree<MenuItem, MenuItemTreeResource>>;
