<template>
    <MainSidebarSection :title="$t('media.filter')">
        <FilesFilters />
    </MainSidebarSection>
    <div v-if="mediaIndex.filters.collection?.value" class="px-4 py-5">
        <ButtonOutline @click="del">Sammlung löschen</ButtonOutline>
    </div>
</template>
<script lang="ts" setup>
import {
    deleteMediaCollection,
    mediaCollectionIndex,
    mediaIndex,
} from '@/entities';
import { MainSidebarSection } from '@/layout';
import { ButtonOutline } from '@/ui';
import { useRoute, useRouter } from 'vue-router';

import FilesFilters from './FilesFilters.vue';

const route = useRoute();
const router = useRouter();

const del = () => {
    let collection = route.params.collection;
    let id = mediaCollectionIndex.items.find(item => item.key == collection)
        ?.id as number;
    if (confirm(`Bist du sicher, dass die Sammlung gelöscht werden soll?`)) {
        deleteMediaCollection(id).then(response => {
            mediaCollectionIndex.load();
            router.push(`/media`);
        });
    }
};
</script>
