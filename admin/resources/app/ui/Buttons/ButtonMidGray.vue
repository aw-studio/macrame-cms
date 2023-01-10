<template>
    <component
        :is="tag"
        class="relative flex items-center justify-center h-8 p-2 text-sm uppercase transition-colors duration-300 rounded"
        :class="{
            'bg-gray-200 hover:bg-gray-300 focus:ring-2 focus:ring-gray-300 cursor-pointer':
                !disabled,
            'opacity-40 cursor-not-allowed focus:ring-transparent': disabled,
        }"
        :disabled="disabled"
        v-bind="$attrs"
    >
        <slot />
    </component>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { getVariant, variants } from '../_props/variant';
import { getSize, sizes } from '../_props/size';

export default defineComponent({
    props: {
        disabled: {
            default: false,
            type: Boolean,
        },
        ...variants,
        ...sizes,
    },
    setup(props, { attrs }) {
        const tag = 'href' in attrs ? 'a' : 'button';
        const variant_ = getVariant(props, {});
        const size_ = getSize(props, {});

        return { tag, variant_, size_ };
    },
});
</script>
