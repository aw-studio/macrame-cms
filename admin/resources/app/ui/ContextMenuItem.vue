<template>
    <component
        :is="as"
        :to="to"
        class="w-full py-2.5 px-[14px] text-left hover:bg-gray-100 rounded-[8px]"
        :class="{
            'flex items-center gap-2': $slots.icon,
        }"
        :disabled="disabled"
    >
        <slot name="icon" />
        <slot>{{ label }}</slot>
    </component>
</template>

<script lang="ts" setup>
import { computed } from 'vue';

const props = defineProps({
    label: {
        type: String,
        required: false,
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    to: {
        type: String,
        default: null,
    },
});

const as = computed(() => {
    return props.to != null ? 'router-link' : 'button';
});
</script>
