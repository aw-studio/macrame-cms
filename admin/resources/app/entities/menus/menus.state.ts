import { Menu } from '@/types';
import { useState } from '@macramejs/macrame-vue3';
import { loadMenus } from './api';

export const menusState = useState<Menu[]>(undefined, {
    load: () => loadMenus(),
});
