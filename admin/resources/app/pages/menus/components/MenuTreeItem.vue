<template>
    <Disclosure as="div" class="mt-3" v-slot="{ open }" defaultOpen>
        <div class="flex items-center">
            <div class="flex items-center w-full p-4 bg-white rounded">
                <div class="px-4 cursor-move handle">
                    <IconDraggable class="w-2.5 h-2.5" />
                </div>
                <div class="text-lg font-semibold">
                    {{ menuItem.title }}
                </div>
                <div>
                    <svg
                        class="w-6 h-6 mx-3 text-gray"
                        width="24"
                        height="24"
                        stroke-width="1.5"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M6.75 12H16.75M16.75 12L14 14.75M16.75 12L14 9.25"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </div>
                <router-link
                    class="flex items-center space-x-2 text-gray"
                    :to="pageLink"
                >
                    {{
                        linksState.value.find(
                            option => option.link == menuItem.link
                        )?.title
                    }}
                    <div
                        class="w-2 h-2 ml-2 mr-4 rounded-full"
                        :class="{
                            'bg-green': menuItem.is_public,
                            'bg-red': !menuItem.is_public,
                        }"
                    ></div>
                </router-link>
                <div class="flex items-center justify-end flex-1">
                    <div class="mr-4">
                        <IconEyeOff
                            v-if="!live || !menuItem.is_public"
                            class="w-4 h-4"
                        />
                    </div>

                    <MenuTreeItemContextMenu :menu-item="menuItem" />
                </div>
            </div>
            <div class="flex justify-center w-16 mr-16">
                <DisclosureButton
                    class="p-1 hover:bg-black rounded-xs"
                    :class="{
                        'rotate-180': !open,
                    }"
                    v-if="children?.items.length > 0"
                >
                    <IconNavArrowDown class="w-3 h-3" />
                </DisclosureButton>
            </div>
        </div>
        <DisclosurePanel class="pl-12">
            <MenuTree :tree="children" :live="live && menuItem.is_public" />
        </DisclosurePanel>
    </Disclosure>
</template>

<script lang="ts" setup>
import { Tree } from '@macramejs/macrame-vue3';
import { MenuItem } from '@/types';
import IconNavArrowDown from '@/ui/Icons/IconNavArrowDown.vue';
import IconDraggable from '@/ui/Icons/custom/IconDraggable.vue';
import { computed, PropType } from 'vue';
import MenuTree from './MenuTree.vue';
import { linksState } from '@/entities';

import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';
import MenuTreeItemContextMenu from './MenuTreeItemContextMenu.vue';
import IconEyeOff from '@/ui/Icons/IconEyeOff.vue';

const props = defineProps({
    menuItem: {
        type: Object as PropType<MenuItem>,
        required: true,
    },
    children: {
        type: Object as PropType<Tree<MenuItem>>,
        required: true,
    },
    live: {
        type: Boolean,
        default: true,
    },
});

const pageLink = computed(() => {
    let pageId = linksState.value
        .find(option => option.link == props.menuItem.link)
        ?.link.split('.')
        .pop();

    return `/pages/edit/${pageId}`;
});
</script>
