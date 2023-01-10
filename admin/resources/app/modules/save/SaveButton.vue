<template>
    <Button @click="emit('save')" class="relative">
        <div
            :class="{
                'opacity-0': busy,
            }"
        >
            <slot> Save </slot>
        </div>
        <div
            class="absolute left-0 flex items-center justify-center w-full h-full"
        >
            <Spinner v-if="busy" class="w-3 h-3 ml-2" />
        </div>
    </Button>
</template>
<script lang="ts" setup>
import { Button, Spinner } from '@/ui';

defineProps({
    busy: {
        type: Boolean,
        default: false,
    },
});

const emit = defineEmits(['save']);

document.addEventListener('keydown', e => {
    const modifier = window.navigator.platform.match('Mac')
        ? e.metaKey
        : e.ctrlKey;

    if (modifier && e.key === 's') {
        e.preventDefault();
        emit('save');
    }
});
</script>
