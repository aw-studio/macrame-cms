<template>
    <BaseSection>
        <template v-slot:title>
            <DrawerTeaserBoxes preview />
        </template>
        <SectionTeaserBoxesForm
            v-bind="$attrs"
            :model-value="modelValue"
            @update:model-value="(e: any) => emit('update:modelValue', e)"
        />
    </BaseSection>
</template>
<script setup lang="ts">
import BaseSection from '../../components/BaseSection.vue';
import DrawerTeaserBoxes from './DrawerTeaserBoxes.vue';
import SectionTeaserBoxesForm from './SectionTeaserBoxesForm.vue';

const emit = defineEmits(['update:modelValue']);

defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            items: [],
        }),
    },
});
</script>
