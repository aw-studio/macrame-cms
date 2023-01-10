<template>
    <SidebarSecondaryLink
        v-for="collection in mediaCollectionIndex.items"
        :to="`/media/${collection.key}`"
    >
        <template v-slot:icon>
            <IconMediaImageList class="w-4 h-4" />
        </template>
        <span>{{ collection.title }}</span>
    </SidebarSecondaryLink>
</template>
<script lang="ts" setup>
import { mediaCollectionIndex, mediaCollectionIndexIsLoaded } from '@/entities';

import { onBeforeMount } from 'vue';
import SidebarSecondaryLink from '@/layout/components/SidebarSecondary/SidebarSecondaryLink.vue';
import IconMediaImageList from '@/ui/Icons/IconMediaImageList.vue';

onBeforeMount(async () => {
    if (!mediaCollectionIndexIsLoaded.value) {
        mediaCollectionIndex.load();
    }
});
</script>
