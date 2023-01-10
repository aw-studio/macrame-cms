<template>
    <component
        :is="tag"
        class="relative inline-flex items-center justify-center text-sm underline uppercase transition-all duration-300 underline-offset-4"
        :class="{
            ' hover:border-indigo-500  after:absolute hover:after:bg-indigo-500  text-black focus:ring-transparent focus:text-orange':
                !disabled,
            'opacity-40  cursor-not-allowed focus:ring-transparent': disabled,
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
        square: {
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
