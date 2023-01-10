<template>
    <BaseSection wrap>
        <template v-slot:title>
            <DrawerDownloads preview />
        </template>
        <SectionDownloadsForm
            v-bind="$attrs"
            :model-value="modelValue"
            @update:model-value="(e: any) => emit('update:modelValue', e)"
        />
    </BaseSection>
</template>
<script setup lang="ts">
import BaseSection from '@/modules/content/components/BaseSection.vue';
import SectionDownloadsForm from './SectionDownloadsForm.vue';
import DrawerDownloads from './DrawerDownloads.vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            headline: '',
            items: [],
        }),
    },
});
</script>
