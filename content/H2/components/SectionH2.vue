<template>
    <BaseSection>
        <template v-slot:title>
            <DrawerH2 preview />
        </template>
        <SectionH2Form
            v-bind="$attrs"
            :model-value="modelValue"
            @update:model-value="(e: any) => emit('update:modelValue', e)"
        />
    </BaseSection>
</template>
<script setup lang="ts">
import BaseSection from '@/modules/content/components/BaseSection.vue';
import DrawerH2 from './DrawerH2.vue';
import SectionH2Form from './SectionH2Form.vue';

const emit = defineEmits(['update:modelValue']);

defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            text: '',
            content_wide: false,
        }),
    },
});
</script>
