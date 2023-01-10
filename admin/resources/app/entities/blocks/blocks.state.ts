import { Block } from '@/types';
import { useState } from '@macramejs/macrame-vue3';
import { loadBlocks } from './api';

export const blocksState = useState<Block[]>([], {
    load: () => loadBlocks(),
});
