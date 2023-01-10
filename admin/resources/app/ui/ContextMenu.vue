<template>
    <Popper v-bind="$attrs" :placement="placement" arrow class="popper-wrapper">
        <slot name="button">
            <button class="p-1 text-gray-100 hover:bg-black rounded-xs">
                <IconMoreHoriz class="w-4 h-4" />
            </button>
        </slot>
        <template #content="{ close }">
            <div
                class="p-4 rounded-[8px] px-[14px] text-base py-[14px] min-w-[200px] bg-white shadow text-black"
            >
                <div class="flex flex-col">
                    <slot :close="close" />
                </div>
            </div>
        </template>
    </Popper>
</template>

<script lang="ts" setup>
import { PropType } from 'vue';
import Popper from 'vue3-popper';
import IconMoreHoriz from './Icons/IconMoreHoriz.vue';

type PopperPlacement =
    | 'bottom'
    | 'auto'
    | 'auto-start'
    | 'auto-end'
    | 'top'
    | 'top-start'
    | 'top-end'
    | 'bottom-start'
    | 'bottom-end'
    | 'right'
    | 'right-start'
    | 'right-end'
    | 'left'
    | 'left-start'
    | 'left-end'
    | undefined;

defineProps({
    placement: {
        type: String as PropType<PopperPlacement>,
        default: 'bottom',
    },
    disabled: {
        type: Boolean,
        default: false,
    },
});
</script>

<style>
#arrow::before {
    background-color: white !important;
}
/* This centers the button which is always wrapperd in a trigger div */
.popper-wrapper > div:not(.popper) {
    display: flex;
}
.popper {
    z-index: 20 !important;
}
</style>
