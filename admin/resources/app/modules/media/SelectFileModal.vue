<template>
    <div @click="isOpen = true" v-if="!hideButton">
        <slot name="button">
            <div
                class="flex flex-col items-center justify-center w-full rounded cursor-pointer bg-gray-50 hover:bg-gray-200 h-28 text-gray"
            >
                <IconAddMediaImage class="w-12 h-12" />
                {{ $t('media.select_document') }}
            </div>
        </slot>
    </div>
    <Modal
        v-model:open="isOpen"
        @close="isOpen = false"
        class="relative media-modal-wrapper"
    >
        <div class="flex">
            <nav
                class="w-[280px] py-6 -mt-6 space-y-2 border-r mr-10 overflow-y-scroll pr-6"
            >
                <div class="pb-6 text-lg font-bold">Sammlungen</div>
                <div
                    class="px-3 py-1 cursor-pointer hover:bg-gray-200 rounded-xs"
                    :class="{
                        ' bg-gray-200 ': !mediaIndex.filters.collection,
                    }"
                    @click="removeFilter()"
                >
                    Alle Dateien
                </div>

                <div
                    v-for="collection in mediaCollectionIndex.items"
                    @click="setFilter(collection.key)"
                    class="px-3 py-1 cursor-pointer hover:bg-gray-200 rounded-xs"
                    :class="{
                        ' bg-gray-200 ':
                            collection.key ==
                            mediaIndex.filters.collection?.value,
                    }"
                >
                    {{ collection.title }}
                </div>
            </nav>
            <div class="relative flex-1">
                <button
                    @click="isOpen = false"
                    class="absolute top-0 right-0 rounded focus:outline-none focus:ring focus:ring-orange-100"
                >
                    <IconCancel />
                </button>
                <div class="pb-6 text-lg font-bold">Datei auswählen</div>
                <div class="grid grid-cols-12 gap-4 mb-5 media-modal">
                    <div
                        class="w-full h-full col-span-6 cursor-pointer sm:col-span-4 md:col-span-4 lg:col-span-2 xl:row-span-2"
                    >
                        <MediaUpload />
                    </div>
                    <div
                        v-for="(file, key) in files"
                        :key="key"
                        class="relative flex items-center col-span-6 rounded cursor-pointer sm:col-span-4 md:col-span-3 lg:col-span-2 xl:col-span-2 aspect-square"
                        @click="selectFile(file)"
                    >
                        <div
                            class="absolute group top-0 left-0 w-full cursor-pointer h-full bg-black border-[3px] border-transparent bg-opacity-0 hover:bg-opacity-80 z-10"
                        >
                            <div
                                class="pt-1 pl-1 text-white truncate opacity-0 group-hover:opacity-100"
                            >
                                {{ file.filename }}
                            </div>
                            <div
                                class="absolute img-checkbox top-0 left-0 hidden items-center justify-center w-5 h-5 rounded-br-[6px] text-white bg-orange"
                            >
                                <svg
                                    width="24"
                                    height="24"
                                    class="scale-75 -translate-x-[3px] -translate-y-px"
                                    stroke-width="1"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="m5 13 4 4L19 7"
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </div>
                        </div>
                        <img
                            v-if="file.mimetype.includes('image')"
                            :src="file.url"
                            class="object-contain w-full h-full"
                        />
                        <div
                            v-if="
                                file.url &&
                                file.mimetype.includes('application')
                            "
                            class="flex items-center justify-center w-full h-full border border-gray-200 rounded pointer-events-none"
                        >
                            <IconEmptyPage class="w-16 h-16" />
                        </div>
                    </div>
                </div>
                <div
                    class="absolute top-0 left-0 z-30 flex items-center justify-center w-full h-full bg-white bg-opacity-60"
                    v-if="mediaIndex.isLoading"
                >
                    <Loading />
                </div>
            </div>
        </div>
        <Pagination :table="(mediaIndex as any)" />
    </Modal>
</template>

<script lang="ts" setup>
import Loading from '@/layout/components/Loading.vue';
import IconAddMediaImage from '@/ui/Icons/IconAddMediaImage.vue';
import IconEmptyPage from '@/ui/Icons/IconEmptyPage.vue';
import IconCancel from '@/ui/Icons/IconCancel.vue';
import { Modal, Pagination } from '@/ui';
import { computed, PropType, ref, watch } from 'vue';
import {
    mediaIndex,
    mediaIndexIsLoaded,
    mediaCollectionIndex,
} from '@/entities';
import { MediaUpload } from '@/modules/media';
import { Media } from '@/types/resources';

const isOpen = ref<boolean>(false);

const emit = defineEmits(['update:modelValue']);

defineProps({
    modelValue: {
        type: Object as PropType<Media | null>,
    },
    hideButton: {
        type: Boolean,
        default: false,
    },
});

const files = computed(() => {
    let data = [];
    data = mediaIndex.items;
    return data;
});

watch(
    () => isOpen.value,
    open => {
        if (open && !mediaIndexIsLoaded.value) {
            console.log('have to load media index');
            mediaIndex.load();
        }
    }
);

const selectFile = (file: any) => {
    emit('update:modelValue', file);
    isOpen.value = false;
};

const setFilter = (collectionKey: string) => {
    if (collectionKey) {
        mediaIndex.setFilter('collection', collectionKey);
    }
};
const removeFilter = () => {
    if (mediaIndex.filters.collection.value) {
        console.log(mediaIndex.filters.collection.value);

        mediaIndex.removeFilter('collection');
    } else {
        mediaIndex.load();
    }
};
</script>

<style>
/* TODO: add exclusive class to modal component in order to select properly! */
.media-modal-wrapper .my-8 {
    height: calc(100vh - 40px);
    max-height: calc(100vh - 40px);
    max-width: calc(100vw - 40px);
    margin: 0 !important;
    overflow: scroll;
}
.media-modal-wrapper nav {
    height: calc(100vh - 40px);
    max-height: calc(100vh - 40px);
}
</style>
