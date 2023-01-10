<template>
    <ResponsiveImage
        :src="(selectedImage?.url?.replaceAll(' ', '%20') as string)"
        v-if="selectedImage?.url"
    />
</template>

<script lang="ts" setup>
import { Media } from '@/types';
import { onBeforeMount, ref } from 'vue';
import { getMediaById } from '.';
import { ResponsiveImage } from '@/ui';

const props = defineProps({
    id: {
        type: Number,
        default: null,
    },
});

const selectedImage = ref<Media | null>(null);

onBeforeMount(async () => {
    if (props.id) {
        selectedImage.value = await getMediaById(props.id);
    }
});
</script>
