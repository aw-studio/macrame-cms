<template>
    <FileUpload inline :url="url" @success="success" multiple :maxFiles="10" />
</template>

<script lang="ts" setup>
import { computed } from 'vue';
import { FileUpload } from '@/ui';
import { mediaCollectionIndex, mediaIndex } from '@/entities';

const emit = defineEmits(['uploaded']);

const success = function () {
    mediaIndex.load();
    emit('uploaded');
};

const url = computed(() => {
    let c = mediaCollectionIndex.items.find(item => {
        return item.key == mediaIndex.filters?.collection?.value;
    });

    return c ? `/media/upload/${c.id}` : `/media/upload`;
});
</script>
