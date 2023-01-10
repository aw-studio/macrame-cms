<template>
    <BaseSection wrap>
        <template v-slot:title>
            <DrawerGridGallery preview />
        </template>
        <SectionGridGalleryForm
            v-bind="$attrs"
            :model-value="modelValue"
            @update:model-value="(e: any) => emit('update:modelValue', e)"
        />
    </BaseSection>
</template>
<script setup lang="ts">
import BaseSection from '@/modules/content/components/BaseSection.vue';
import DrawerGridGallery from './DrawerGridGallery.vue';
import SectionGridGalleryForm from './SectionGridGalleryForm.vue';

const emit = defineEmits(['update:modelValue']);
const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            items: [],
        }),
    },
});
</script>
