<template>
    <div
        class="relative"
        :class="{
            'overflow-hidden': !overflow,
        }"
    >
        <img
            :src="thumb"
            class="w-full h-auto max-w-full max-h-full lazyload lazyload-animation"
            :class="{
                'object-cover': cover,
                'object-contain': contain,
            }"
            data-sizes="auto"
            :data-srcset="srcset"
            :srcset="srcset"
        />
    </div>
</template>

<script lang="ts" setup>
import 'lazysizes';
import { computed, PropType } from 'vue';

const props = defineProps({
    src: {
        type: String,
        required: true,
    },
    sizes: {
        type: Array as PropType<number[]>,
        default: () => {
            return [10, 300, 500, 900, 1400];
        },
    },
    cover: {
        type: Boolean,
        default: false,
    },
    contain: {
        type: Boolean,
        default: false,
    },
    overflow: {
        type: Boolean,
        default: false,
    },
});

const thumb = computed(() => {
    let w = Math.min.apply(Math, props.sizes);
    return `${props.src}?w=${w}`;
});

const srcset = computed(() => {
    let srcset = '';
    props.sizes.forEach(size => {
        srcset += `${props.src}?w=${size} ${size}w, `;
    });
    return srcset;
});
</script>

<style>
.lazyload,
.lazyloading {
    filter: blur(20px);
}
.lazyloaded {
    filter: blur(0px);
}
.lazyload-animation {
    transition: 0.25s filter ease;
}
</style>
