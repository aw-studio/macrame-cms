<template>
    <FormFieldLabel> Bild </FormFieldLabel>
    <Card class="mb-6">
        <Toggle v-model="model.content_wide" label="Ganze Containerbreite" />
    </Card>
    <SelectImage v-model="model.image" />
</template>
<script setup lang="ts">
import SelectImage from '@/modules/media/SelectImage.vue';
import { FormFieldLabel, Toggle, Card } from '@/ui';

import { watch, reactive } from 'vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            content_wide: false,
            image: {
                id: null,
                title: '',
                alt: '',
            },
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
