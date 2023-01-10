<template>
    <component
        :is="as"
        class="rounded-sm"
        :class="{
            'bg-white': variant_ == 'white',
            'bg-gray-300': variant_ == 'gray',
            'p-8': size_ == 'md',
            'p-4': size_ == 'sm',
        }"
    >
        <slot />
    </component>
</template>

<script lang="ts" setup>
import { getVariant, variants } from './_props/variant';
import { getSize, sizes } from './_props/size';

const props = defineProps({
    as: {
        type: String,
        default: 'div',
    },
    variant: variants.variant,
    white: {
        type: Boolean,
        default: false,
    },
    gray: variants.gray,
    size: sizes.size,
    sm: sizes.sm,
    md: sizes.md,
});

let variant_ = getVariant(props, { DEFAULT: 'white' });
let size_ = getSize(props, { only: ['sm', 'md'] });
</script>
