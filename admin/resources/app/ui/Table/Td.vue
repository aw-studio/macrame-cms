<template>
    <td :class="{ slim }">
        <component :is="as" :to="link" class="block py-5 pl-6 pr-6">
            <slot />
        </component>
    </td>
</template>

<script lang="ts" setup>
import { inject, computed } from 'vue';

const link = inject('link') || null;

const props = defineProps({
    slim: {
        type: Boolean,
        default: false,
    },
});

const as = computed(() => {
    return link ? 'router-link' : 'div';
});
</script>
