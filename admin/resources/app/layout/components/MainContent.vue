<template>
    <div class="relative flex-1 overflow-y-auto">
        <div class="sticky top-0 z-40 w-full" v-if="$slots.header">
            <slot name="header" />
        </div>
        <div class="relative px-10 pt-6 pb-10">
            <slot />
        </div>

        <div
            class="absolute top-0 left-0 z-30 flex items-center justify-center w-full h-full bg-white bg-opacity-60"
            v-if="busy"
        >
            <Loading />
        </div>
    </div>
</template>
<script lang="ts" setup>
import Loading from '@/layout/components/Loading.vue';
defineProps({
    busy: {
        type: Boolean,
        default: false,
    },
});
</script>
