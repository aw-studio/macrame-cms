<template>
    <BaseSection wrap>
        <template v-slot:title>
            <DrawerImageFull preview />
        </template>
        <SectionImageFullForm
            v-bind="$attrs"
            :model-value="modelValue"
            @update:model-value="(e: any) => emit('update:modelValue', e)"
        />
    </BaseSection>
</template>
<script setup lang="ts">
import BaseSection from '../../components/BaseSection.vue';
import DrawerImageFull from '././DrawerImageFull.vue';
import SectionImageFullForm from './SectionImageFullForm.vue';

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
</script>
