<template>
    <Card>
        <Select
            label="Block"
            v-model="model.block"
            :options="blockOptions"
            label-key="name"
            value-key="id"
        />
    </Card>
</template>
<script setup lang="ts">
import { blocksState } from '@/entities';
import { Card, Select } from '@/ui';

import { watch, reactive, computed } from 'vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            block: null,
        }),
    },
});

const model = reactive(props.modelValue);

const blockOptions = computed(() => {
    return blocksState.value?.map(block => {
        return {
            id: block.id,
            name: block.name,
        };
    });
});

watch(
    () => model,
    () => emit('update:modelValue', model),
    { deep: true }
);
</script>
