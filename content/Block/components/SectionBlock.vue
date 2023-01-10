<template>
    <BaseSection wrap>
        <template v-slot:title>
            <DrawerBlock preview />
        </template>
        <SectionBlockForm
            v-bind="$attrs"
            :model-value="modelValue"
            @update:model-value="(e: any) => emit('update:modelValue', e)"
        />
    </BaseSection>
</template>
<script setup lang="ts">
import BaseSection from '@/modules/content/components/BaseSection.vue';
import SectionBlockForm from './SectionBlockForm.vue';
import DrawerBlock from './DrawerBlock.vue';

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
</script>
