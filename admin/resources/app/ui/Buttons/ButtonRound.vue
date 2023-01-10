<template>
    <component
        :is="tag"
        class="relative inline-flex items-center justify-center text-sm uppercase transition-all duration-300 rounded-full focus:ring focus:outline-none"
        :class="{
            'h-[37px] w-[37px] ': size_ == 'md',
            'h-[30px] w-[30px] ': size_ == 'sm',

            'bg-gray text-white cursor-not-allowed': disabled,

            'bg-gradient-to-r from-gradient-red-500 to-gradient-orange-500 hover:from-gradient-red-300 hover:to-gradient-orange-300 hover:scale-95 active:from-gradient-red-700 active:to-gradient-orange-700 text-white focus:ring-orange-100 shadow-orange shadow-primary':
                variant_ == 'primary' && !disabled,

            'bg-white hover:from-gradient-red-300 hover:to-gradient-orange-300 hover:scale-95 active:from-gradient-red-700 active:to-gradient-orange-700 text-gray-900 focus:ring-orange-100 ':
                variant_ == 'white' && !disabled,

            'bg-black hover:from-gradient-red-300 hover:to-gradient-orange-300 hover:scale-95 active:from-gradient-red-700 active:to-gradient-orange-700 text-white focus:ring-orange-100 ':
                variant_ == 'black' && !disabled,
        }"
        :disabled="disabled"
        v-bind="$attrs"
    >
        <slot />
    </component>
</template>

<script lang="ts" setup>
import { useAttrs } from 'vue';
import { getVariant, variants } from '../_props/variant';
import { getSize, sizes } from '../_props/size';

const props = defineProps({
    disabled: {
        default: false,
        type: Boolean,
    },
    outline: {
        default: false,
        type: Boolean,
    },
    ...variants,
    ...sizes,
});

const attrs = useAttrs();

const tag = 'href' in attrs ? 'a' : 'button';

const variant_ = getVariant(props, {});
const size_ = getSize(props, {});
</script>
