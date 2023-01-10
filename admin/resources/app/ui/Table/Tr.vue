<template>
    <tr class="hover:bg-gray-200 odd:bg-gray-50">
        <slot />
    </tr>
</template>

<script lang="ts" setup>
import { provide } from 'vue';

const props = defineProps({
    link: {
        type: String,
        default: null,
    },
});

provide('link', props.link);
</script>
