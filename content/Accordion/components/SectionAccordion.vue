<template>
    <BaseSection wrap>
        <template v-slot:title>
            <DrawerAccordion preview />
        </template>
        <SectionAccordionForm
            v-bind="$attrs"
            :model-value="modelValue"
            @update:model-value="(e: any) => emit('update:modelValue', e)"
        />
    </BaseSection>
</template>
<script setup lang="ts">
import BaseSection from '@/modules/content/components/BaseSection.vue';
import DrawerAccordion from './DrawerAccordion.vue';
import SectionAccordionForm from './SectionAccordionForm.vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            headline: '',
            content_wide: false,
            items: [],
        }),
    },
});
</script>
