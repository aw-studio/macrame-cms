<template>
    <component
        :is="tag"
        class="relative inline-flex h-[37px] rounded px-5 items-center justify-center text-sm uppercase transition-all duration-300 focus:ring focus:outline-none"
        :class="{
            'focus:ring-transparent': disabled,

            'w-[37px]': square,

            'bg-orange-500 bg-opacity-0 border border-indigo-900 hover:bg-opacity-20 hover:scale-95 active:bg-opacity-50 text-black focus:ring-orange-100':
                !disabled,
            'opacity-40 border border-indigo-900 cursor-not-allowed': disabled,
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
