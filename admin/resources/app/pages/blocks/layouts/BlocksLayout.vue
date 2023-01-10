<template>
    <SidebarSecondary>
        <template v-slot:header>
            <SidebarSecondaryHeader title="Blöcke">
                <template v-slot:icon>
                    <IconReportColumns class="w-5 h-5" />
                </template>
                <template v-slot:help>
                    <BlocksHelp />
                </template>
                <AddBlockModal />
            </SidebarSecondaryHeader>
        </template>
        <SidebarSecondarySection>
            <SidebarSecondaryLink
                v-for="block in blocksState.value"
                :key="block.id"
                :title="block.name"
                :to="`/blocks/${block.id}`"
                class="cursor-pointer"
            />
        </SidebarSecondarySection>
    </SidebarSecondary>
    <Main>
        <router-view />
    </Main>
</template>

<script setup lang="ts">
import {
    SidebarSecondaryHeader,
    SidebarSecondary,
    SidebarSecondarySection,
    SidebarSecondaryLink,
} from '@/layout';
import Main from '@/layout/components/Main.vue';
import IconReportColumns from '@/ui/Icons/IconReportColumns.vue';
import AddBlockModal from '../components/AddBlockModal.vue';
import BlocksHelp from './components/BlocksHelp.vue';
import { onMounted } from 'vue';
import {
    blocksState,
    linksState,
    mediaIndex,
    mediaCollectionIndex,
    mediaIndexIsLoaded,
    mediaCollectionIndexIsLoaded,
} from '@/entities';

onMounted(async () => {
    await blocksState.load();
    await linksState.load();

    if (!mediaIndexIsLoaded.value) {
        mediaIndex.load();
    }
    if (!mediaCollectionIndexIsLoaded.value) {
        mediaCollectionIndex.load();
    }
});
</script>
