<template>
    <button
        class="flex items-center px-6 py-3 text-sm font-semibold tracking-wider text-black uppercase bg-gray-200 rounded hover:bg-gray-300 whitespace-nowrap"
    >
        <IconPlus class="w-5 h-5 mr-4" />
        <slot> Add </slot>
    </button>
</template>

<script lang="ts" setup>
import IconPlus from '@/ui/Icons/IconPlus.vue';
</script>
