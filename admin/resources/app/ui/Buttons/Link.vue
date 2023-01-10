<template>
    <component
        :is="tag"
        :disabled="disabled"
        v-bind="$attrs"
        class="underline text-orange hover:text-orange-700"
        :class="{ '!text-gray': disabled }"
    >
        <slot />
    </component>
</template>

<script lang="ts" setup>
import { useAttrs } from 'vue';

const props = defineProps({
    disabled: {
        default: false,
        type: Boolean,
    },
});

const attrs = useAttrs();

const tag = 'to' in attrs ? 'router-link' : 'button';
</script>
