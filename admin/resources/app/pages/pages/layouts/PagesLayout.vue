<template>
    <SidebarSecondary>
        <template v-slot:header>
            <SidebarSecondaryHeader :title="$t('pages.pages')">
                <template v-slot:icon>
                    <IconPage class="w-5 h-5" />
                </template>
                <template v-slot:help>
                    <PagesHelp />
                </template>
                <AddPageModal />
            </SidebarSecondaryHeader>
        </template>
        <transition name="fade">
            <div v-if="pageTree.isLoading" class="py-0.5 -ml-4 pr-2">
                <PageTreeSkeletonItem v-for="i in 7" />
            </div>
            <Tree v-else :children="pageTree.items" class="pr-2 -ml-4" />
        </transition>
    </SidebarSecondary>
    <Main>
        <router-view />
    </Main>
</template>

<script setup lang="ts">
import { onBeforeMount, onMounted } from 'vue';
import { SidebarSecondary, SidebarSecondaryHeader } from '@/layout';
import { Main } from '@/layout';
import IconPage from '@/ui/Icons/IconPage.vue';
import Tree from './../components/Tree/Tree.vue';
import AddPageModal from './../components/AddPageModal.vue';

import {
    blocksState,
    pageTree,
    updatePageTree,
    mediaIndex,
    mediaCollectionIndex,
    mediaIndexIsLoaded,
    mediaCollectionIndexIsLoaded,
} from '@/entities';
import PagesHelp from './components/PagesHelp.vue';
import PageTreeSkeletonItem from './components/PageTreeSkeletonItem.vue';

const loadTree = () => {
    pageTree.load(undefined);

    pageTree.onOrderChange((order: any) =>
        updatePageTree({ order }, undefined)
    );
};

onBeforeMount(() => {
    loadTree();
});

onMounted(() => {
    blocksState.load();

    if (!mediaIndexIsLoaded.value) {
        mediaIndex.load();
    }
    if (!mediaCollectionIndexIsLoaded.value) {
        mediaCollectionIndex.load();
    }
});
</script>
