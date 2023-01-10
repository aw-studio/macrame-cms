import { Menu } from '@/types';
import { useState } from '@macramejs/macrame-vue3';
import { loadMenu } from './api';

export const menuState = useState<Menu, [number]>(undefined, {
    load: id => loadMenu(id),
});
