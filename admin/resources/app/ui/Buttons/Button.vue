<template>
    <component
        :is="tag"
        class="relative inline-flex items-center justify-center text-sm uppercase transition-all duration-300 focus:ring focus:outline-none"
        :class="{
            'focus:ring-transparent': disabled,

            'w-[37px]': square && size_ == 'md',
            'w-[30px]': square && size_ == 'sm',

            'h-[37px] rounded': size_ == 'md' && !text && !round,
            'h-[30px] rounded': size_ == 'sm' && !text && !round,

            'px-5': size_ == 'md' && !square && !text && !round,
            'px-4': size_ == 'sm' && !square && !text && !round,

            'bg-gradient-to-r from-gradient-red-500 to-gradient-orange-500 hover:from-gradient-red-300 hover:to-gradient-orange-300 hover:scale-95 active:from-gradient-red-700 active:to-gradient-orange-700 text-white focus:ring-orange-100 shadow-orange shadow-primary':
                variant_ == 'primary' && !disabled,
            'bg-gray text-white cursor-not-allowed':
                variant_ == 'primary' && disabled,

            'bg-gradient-to-r w-[37px] h-[37px] rounded-full from-indigo-900 to-indigo-900 hover:from-gradient-red-500 hover:to-gradient-orange-500 hover:scale-95 active:from-indigo-500 active:to-indigo-500 text-white focus:ring-orange-100':
                round && !disabled,
            'bg-gray text-white rounded-full cursor-not-allowed':
                round && disabled,

            'bg-orange-500 bg-opacity-0 border border-indigo-900 hover:bg-opacity-20 hover:scale-95 active:bg-opacity-50 text-black focus:ring-orange-100':
                variant_ == 'secondary' && !disabled,
            'opacity-40 border border-indigo-900 cursor-not-allowed':
                variant_ == 'secondary' && disabled,

            'bg-gray-200 hover:bg-gray-500 h-[30px] active:bg-indigo-900 active:text-white text-black focus:ring-gray-300':
                size_ == 'sm' && !disabled,
            'opacity-40 cursor-not-allowed': size_ == 'sm' && disabled,

            'focus:rounded hover:border-indigo-500 h-[20px] py-3 px-2.5 after:absolute after:left-1/2 after:bottom-[3px] after:h-px after:w-[calc(100%-20px)] after:-translate-x-1/2 hover:after:bg-indigo-500 active:after:bg-indigo-500 text-black focus:ring-transparent focus:bg-orange-100':
                text && !disabled,
            'opacity-40 py-2 h-[20px] px-3 cursor-not-allowed':
                text && disabled,
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
        text: {
            default: false,
            type: Boolean,
        },
        square: {
            default: false,
            type: Boolean,
        },
        round: {
            default: false,
            type: Boolean,
        },
        outline: {
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
