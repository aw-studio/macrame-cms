<template>
    <FormFieldLabel> Bild </FormFieldLabel>
    <SelectImage v-model="model.image" />
</template>
<script setup lang="ts">
import SelectImage from '@/modules/media/SelectImage.vue';
import { FormFieldLabel } from '@/ui';

import { watch, reactive, computed } from 'vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
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
