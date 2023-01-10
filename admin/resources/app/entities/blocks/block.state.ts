import { Block } from '@/types';
import { useState } from '@macramejs/macrame-vue3';
import { loadBlock } from './api';

export const blockState = useState<Block, [number]>(undefined, {
    load: id => loadBlock(id),
});
