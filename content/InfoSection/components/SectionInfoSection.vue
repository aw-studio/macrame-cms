<template>
    <BaseSection wrap>
        <template v-slot:title>
            <DrawerInfoSection preview />
        </template>
        <SectionInfoSectionForm
            v-bind="$attrs"
            :model-value="modelValue"
            @update:model-value="(e: any) => emit('update:modelValue', e)"
        />
    </BaseSection>
</template>
<script setup lang="ts">
import BaseSection from '@/modules/content/components/BaseSection.vue';
import SectionInfoSectionForm from './SectionInfoSectionForm.vue';
import DrawerInfoSection from '././DrawerInfoSection.vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            text: '',
            image: {
                id: null,
                title: '',
                alt: '',
            },
            link: {
                link: '',
                text: '',
                new_tab: false,
            },
        }),
    },
});
</script>
