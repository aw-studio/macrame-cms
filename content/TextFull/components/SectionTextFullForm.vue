<template>
    <Card class="flex flex-col gap-6">
        <Toggle v-model="model.content_wide" label="Ganze Containerbreite" />
        <Wysiwyg v-model="model.text" class="w-full" />
    </Card>
</template>
<script setup lang="ts">
import { Card, Wysiwyg, Toggle } from '@/ui';
import { watch, reactive } from 'vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            content_wide: false,
            text: '',
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
