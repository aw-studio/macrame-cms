<template>
    <BaseSection wrap>
        <template v-slot:title>
            <DrawerImageSmall preview />
        </template>
        <SectionImageSmallForm
            v-bind="$attrs"
            :model-value="modelValue"
            @update:model-value="(e: any) => emit('update:modelValue', e)"
        />
    </BaseSection>
</template>
<script setup lang="ts">
import BaseSection from '@/modules/content/components/BaseSection.vue';
import DrawerImageSmall from '././DrawerImageSmall.vue';
import SectionImageSmallForm from './SectionImageSmallForm.vue';

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
</script>
