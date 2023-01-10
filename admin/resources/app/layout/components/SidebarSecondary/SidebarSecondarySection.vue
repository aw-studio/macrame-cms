<template>
    <div class="flex flex-col gap-1 p-2 text-gray-100">
        <div v-if="title" class="pb-2 text-xs text-white uppercase">
            {{ title }}
        </div>
        <slot />
    </div>
</template>

<script lang="ts" setup>
defineProps({
    title: {
        type: String,
        default: null,
    },
});
</script>
