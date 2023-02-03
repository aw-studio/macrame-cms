<template>
    <div class="relative w-full">
        <div
            class="mb-2 text-sm uppercase text-gray"
            v-if="!mediaIndex.isLoading"
        >
            {{ $t('media.n_files', mediaIndex.meta.total) }}
        </div>
        <div class="relative grid grid-cols-12 gap-5">
            <div
                class="flex justify-center col-span-12 xl:col-span-4 xl:row-span-2"
            >
                <MediaUpload :collection="collection" />
            </div>
            <div
                v-for="file in mediaIndex.items"
                :key="file.id"
                class="relative flex items-center justify-center col-span-12 cursor-pointer md:col-span-6 lg:col-span-4 xl:col-span-2 2xl:col-span-2 3xl:col-span-1 aspect-square"
            >
                <FileMenu :file="file" class="absolute z-30 bottom-2 right-1" />
                <label class="z-20 w-full h-full img-container">
                    <input
                        type="checkbox"
                        :id="`${file.id}`"
                        class="absolute opacity-0"
                        :value="file"
                        v-model="selection.files"
                    />
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
                    <ResponsiveImage
                        v-if="
                            file.url && !file.mimetype.includes('application')
                        "
                        :src="file.url.replaceAll(' ', '%20')"
                        class="flex items-center w-full h-full pointer-events-none"
                        contain
                        :sizes="[10, 200]"
                    />
                    <div
                        v-if="file.url && file.mimetype.includes('application')"
                        class="flex items-center justify-center w-full h-full border border-gray-200 rounded pointer-events-none"
                    >
                        <IconEmptyPage class="w-16 h-16" />
                    </div>
                </label>

                <div
                    class="absolute z-10 flex items-center justify-center w-full h-full"
                >
                    <div
                        v-if="file.mimetype.includes('image')"
                        class="flex items-center justify-center w-12 h-12 text-white rounded bg-gray"
                    >
                        <IconMediaImage class="w-6 h-6" />
                    </div>
                </div>
            </div>
        </div>
        <div class="py-8">
            <!-- TODO: fix any -->
            <Pagination :table="(mediaIndex as any)" />
        </div>
    </div>
</template>

<script lang="ts" setup>
import { MediaUpload } from '@/modules/media';
import { selection } from '../modules';
import { mediaIndex } from '@/entities';
import FileMenu from './FileMenu.vue';
import { Pagination } from '@/ui';
import IconEmptyPage from '@/ui/Icons/IconEmptyPage.vue';
import ResponsiveImage from '@/ui/ResponsiveImage.vue';
import IconMediaImage from '@/ui/Icons/IconMediaImage.vue';

defineProps({
    collection: {
        type: Number,
        default: null,
    },
});
</script>

<style scoped>
.tab-height {
    height: calc(100vh - 230px);
}

.img-container:hover .btn-wrapper,
.img-container:hover span {
    display: block !important;
}
.img-container > input:checked + div {
    border-color: #fead5e !important;
}
.img-container > input:checked + div > .img-checkbox {
    display: flex !important;
}
</style>
