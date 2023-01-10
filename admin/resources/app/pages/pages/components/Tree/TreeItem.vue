<template>
    <div
        class="relative"
        :class="{
            'pb-1': !showChildren,
        }"
    >
        <div class="relative flex items-center">
            <div
                style="bottom: 50%; top: 50%"
                class="absolute left-0 h-full"
                v-if="page.parent_id"
            >
                <div class="absolute w-2 h-px -ml-2 bg-gray-700"></div>
            </div>
            <div class="absolute left-0 h-full" v-if="page.parent_id">
                <div
                    class="absolute w-px -ml-2 bg-gray-700"
                    :class="{
                        'h-full': !isLast,
                        'h-1/2': isLast,
                    }"
                ></div>
            </div>
            <div
                class="flex items-center flex-1 pr-2 bg-white rounded group hover:bg-opacity-5"
                :class="{
                    'bg-opacity-10': isActive,
                    'bg-opacity-0': !isActive,
                }"
            >
                <div class="flex items-center px-3 cursor-move handle">
                    <IconDraggable class="w-2.5 h-2.5 fill-gray" />
                </div>
                <div
                    class="w-2 h-2 mr-2 rounded-full"
                    :class="{
                        ' bg-green': page.has_been_published, // live
                        ' bg-orange': page.is_live && !page.has_been_published, // scheduled
                        ' bg-red': !page.is_live && !page.publish_at, // not live && not scheduled
                    }"
                    :title="
                        page.is_live ? $t('pages.online') : $t('pages.offline')
                    "
                ></div>
                <router-link
                    class="flex-1 py-1 text-white cursor-pointer"
                    :to="`/pages/edit/${page.id}`"
                >
                    <span
                        :class="{
                            'opacity-50': !page.is_live,
                        }"
                    >
                        {{ page.name }}
                    </span>
                </router-link>

                <PageContextMenu :page="page" />
            </div>
            <div
                class="flex justify-center w-6 text-white cursor-pointer"
                @click="showChildren = !showChildren"
            >
                <IconNavArrowDown
                    class="w-4 h-4"
                    :class="{
                        'rotate-180': !showChildren,
                    }"
                    v-if="hasChildren"
                />
            </div>
        </div>

        <div
            class="absolute top-0 left-0 flex justify-center h-full ml-4 border-l border-gray-700"
            v-if="page.parent_id && !isLast"
        >
            <div
                class="absolute top-0 w-1 h-1 rotate-45 bg-gray-700"
                style="margin-left: -1px"
                v-if="page.parent_id && isFirst"
            ></div>
        </div>
        <div class="relative" v-if="showChildren">
            <slot></slot>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { computed, PropType, ref } from 'vue';
import { Page } from '@/types';
import PageContextMenu from './PageContextMenu.vue';
import IconDraggable from '@/ui/Icons/custom/IconDraggable.vue';
import IconNavArrowDown from '@/ui/Icons/IconNavArrowDown.vue';
import { useRoute } from 'vue-router';

const props = defineProps({
    page: {
        type: Object as PropType<Page>,
        required: true,
    },
    children: {
        type: Array,
        required: true,
    },
    isFirst: {
        type: Boolean,
        default: false,
    },
    isLast: {
        type: Boolean,
        default: false,
    },
});

const route = useRoute();

const isActive = computed(() => {
    return (route.params.page as any) == props.page.id;
});
const hasChildren = computed(() => {
    return props.children?.length > 0;
});

const showChildren = ref<boolean>(!hasChildren.value);
</script>

<style></style>
