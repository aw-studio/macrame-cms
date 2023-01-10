<template>
    <Main>
        <Topbar>
            <div class="font-semibold">
                {{ name }}
            </div>
        </Topbar>
        <MainBody>
            <MainContent :busy="mediaIndex.isLoading">
                <template v-slot:header>
                    <div class="relative flex justify-center h-12">
                        <TransitionSlideFade>
                            <div
                                class="absolute px-8 py-2 text-gray-600 bg-gray-200 rounded-b"
                                v-if="selection.files.length > 0"
                            >
                                <FileSelection />
                            </div>
                        </TransitionSlideFade>
                    </div>
                </template>
                <FilesGrid />
            </MainContent>
            <MainSidebar :title="$t('media.filter')" v-model:open="isOpen">
                <template v-slot:icon>
                    <IconInputSearch class="w-4 h-4" />
                </template>
                <FilesSidebar />
            </MainSidebar>
        </MainBody>
    </Main>
</template>

<script lang="ts" setup>
import { ref, computed, watch } from 'vue';

import { Topbar } from '@/layout';
import { Main, MainBody, MainContent, MainSidebar } from '@/layout';
import { mediaIndex, mediaCollectionIndex } from '@/entities';

import FileSelection from './components/FileSelection.vue';
import FilesGrid from './components/FilesGrid.vue';
import IconInputSearch from '@/ui/Icons/IconInputSearch.vue';
import FilesSidebar from './components/sidebar/FilesSidebar.vue';
import { useRoute } from 'vue-router';
import { selection } from './modules';
import TransitionSlideFade from '@/ui/Transitions/TransitionSlideFade.vue';

mediaCollectionIndex.load();

const isOpen = ref(true);

const name = computed(() => {
    if (mediaIndex.filters.collection?.value) {
        return mediaCollectionIndex.items.find(
            item => item.key == mediaIndex.filters.collection?.value
        )?.title;
    }
    return mediaIndex.filters.collection?.value || 'Alle Medien';
});

const route = useRoute();

const loadCollection = (collection: string | undefined) => {
    if (collection) {
        mediaIndex.setFilter('collection', collection);
    } else {
        if (mediaIndex.filters.collection) {
            mediaIndex.removeFilter('collection');
        } else {
            mediaIndex.load();
        }
    }
};

watch(
    () => route.params.collection,
    collection => {
        loadCollection(collection as any);
    },
    {
        immediate: true,
    }
);
</script>
