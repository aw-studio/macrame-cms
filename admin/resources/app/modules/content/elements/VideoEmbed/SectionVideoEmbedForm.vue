<template>
    <FormFieldLabel>Vimeo-ID</FormFieldLabel>
    <Card class="flex flex-col gap-6">
        <Toggle v-model="model.content_wide" label="Ganze Containerbreite" />
        <Input v-model="model.id" label="Vimeo-ID" />
    </Card>
</template>
<script setup lang="ts">
import { FormFieldLabel, Input, Card, Toggle } from '@/ui';

import { watch, reactive, computed } from 'vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            id: '',
            content_wide: false,
        }),
    },
});

const model = reactive(props.modelValue);

watch(
    () => model,
    () => emit('update:modelValue', model),
    { deep: true }
);
</script>
