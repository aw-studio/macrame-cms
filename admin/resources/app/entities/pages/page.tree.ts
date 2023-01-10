import { Page, PageTreeResource } from '@/types';
import { Tree, useTree } from '@macramejs/macrame-vue3';
import { loadPageTree, updatePageTree } from './api';
import { useRoute } from 'vue-router';

export type UsePageTree = () => Tree<
    Page,
    PageTreeResource,
    [number | undefined]
>;

export const usePageTree: UsePageTree = () => {
    const tree = useTree<Page>({
        load: (parent_id?: number) => loadPageTree(parent_id),
    });

    tree.onOrderChange(order => {
        console.log({ order });
    });

    return tree;
};

export const pageTree = usePageTree();
