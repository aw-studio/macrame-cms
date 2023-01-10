<template>
    <div class="relative">
        <div
            v-if="selectedImage"
            class="relative overflow-hidden rounded-sm mg-gray-100 min-h-[50px]"
        >
            <div class="absolute w-full h-full transform scale-110">
                <img
                    :src="selectedImage?.url?.replaceAll(' ', '%20') + '?w=20'"
                    class="object-cover w-full h-full"
                />
            </div>
            <div
                class="absolute top-0 left-0 w-full h-full bg-white bg-opacity-50 backdrop-filter backdrop-blur-md"
            ></div>

            <div class="flex justify-center w-full image-preview">
                <ResponsiveImage
                    :src="(selectedImage?.url?.replaceAll(' ', '%20') as string)"
                />
            </div>
        </div>
        <SelectImageModal v-model="selectedImage" v-else />
        <div class="absolute top-1 right-1" v-if="selectedImage">
            <ContextMenu placement="left">
                <template #button>
                    <InteractionButton class="mt-2 mr-2 cursor-pointer" dark>
                        <IconMoreHoriz class="w-4 h-4" />
                    </InteractionButton>
                </template>
                <ContextMenuItem
                    class="hover:bg-red-signal text-red-signal hover:text-white"
                    @click="deleteImage()"
                >
                    <template #icon>
                        <IconTrash class="origin-left scale-75" />
                    </template>
                    <span>{{ $t('media.delete') }}</span>
                </ContextMenuItem>
            </ContextMenu>
        </div>
    </div>
</template>

<script lang="ts" setup>
import 'lazysizes';
import { getMediaById } from '@/modules/media';
import { onBeforeMount, PropType, ref, watch } from 'vue';
import SelectImageModal from './SelectImageModal.vue';
import {
    ResponsiveImage,
    InteractionButton,
    ContextMenu,
    ContextMenuItem,
} from '@/ui';

import IconMoreHoriz from '@/ui/Icons/IconMoreHoriz.vue';
import IconTrash from '@/ui/Icons/IconTrash.vue';
import { Media } from '@/types';
import { mediaIndex } from '@/entities';

const emit = defineEmits(['update:modelValue']);

interface ParseableImage {
    id: number;
    title: string;
    alt: string;
}

const props = defineProps({
    modelValue: {
        type: Object as PropType<ParseableImage>,
    },
    collection: {
        type: [String],
        default: null,
    },
});

const model = ref(props.modelValue);
const selectedImage = ref<Media | null>(null);

onBeforeMount(async () => {
    selectedImage.value = props.modelValue?.id
        ? await getMediaById(props.modelValue.id)
        : null;

    if (props.collection) {
        mediaIndex.setFilter('collection', props.collection);
    }
});

watch(
    () => selectedImage.value,
    val => {
        emit('update:modelValue', {
            ...model.value,
            id: val?.id,
        });
    }
);

const deleteImage = () => {
    selectedImage.value = null;
};
</script>

<style>
.image-preview {
    background: rgba(0, 0, 0, 0.025);
}
.image-preview img {
    max-height: 25vh;
    width: auto;
    object-fit: contain;
    object-fit: contain !important;
}
</style>
