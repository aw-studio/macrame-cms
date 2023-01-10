<template>
    <Disclosure v-slot="{ open }" :defaultOpen="defaultOpen">
        <div class="flex items-center justify-between w-full group">
            <div
                class="flex justify-between flex-1 pl-3 pr-2 rounded"
                :class="{
                    'bg-gray-500': isActive && background,
                    'border-gray border': outline,
                    'hover:bg-gray-500 hover:bg-opacity-20 bg-opacity-10 h-[36px]':
                        background,
                }"
            >
                <div
                    class="flex items-center pr-3 cursor-move handle"
                    :class="{
                        'text-gray-100': background,
                    }"
                >
                    <IconDraggable
                        class="w-2.5 h-2.5"
                        :class="{
                            'fill-gray': background,
                        }"
                    />
                </div>
                <div
                    class="flex items-center justify-between flex-1"
                    :class="{
                        'text-gray-100': background,
                    }"
                >
                    <slot />
                </div>
            </div>
            <div class="flex items-center w-8">
                <DisclosureButton
                    class="p-1 hover:bg-black rounded-xs"
                    :class="{
                        'text-gray-100': background,
                        'rotate-180': !open,
                    }"
                    v-if="children?.items.length > 0"
                >
                    <IconNavArrowDown class="w-3 h-3" />
                </DisclosureButton>
            </div>
        </div>
        <DisclosurePanel class="pl-2">
            <slot name="disclosure" />
        </DisclosurePanel>
    </Disclosure>
</template>

<script lang="ts" setup>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';
import IconDraggable from '../Icons/custom/IconDraggable.vue';
import IconNavArrowDown from '../Icons/IconNavArrowDown.vue';

const props = defineProps({
    item: {
        required: true,
    },
    children: {
        type: Object,
        required: true,
    },
    isActive: {
        type: Boolean,
        default: false,
    },
    background: {
        type: Boolean,
        default: false,
    },
    outline: {
        type: Boolean,
        default: false,
    },
    defaultOpen: {
        type: Boolean,
        default: true,
    },
});
</script>
