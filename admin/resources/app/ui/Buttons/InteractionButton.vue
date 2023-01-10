<template>
    <div
        class="flex items-center justify-center w-8 h-8 overflow-hidden rounded"
        :class="{
            'bg-white hover:bg-gray-200 text-black': !gray && !orange,
            'bg-gray-200 hover:bg-gray-500 text-black': gray,
            'bg-orange hover:bg-orange-700 text-white': orange,
        }"
    >
        <slot />
    </div>
</template>

<script lang="ts" setup>
defineProps({
    gray: {
        type: Boolean,
        default: false,
    },
    orange: {
        type: Boolean,
        default: false,
    },
});
</script>
