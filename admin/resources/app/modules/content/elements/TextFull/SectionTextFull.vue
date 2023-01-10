<template>
    <BaseSection wrap>
        <template v-slot:title>
            <DrawerTextFull preview />
        </template>
        <SectionTextFullForm
            v-bind="$attrs"
            :model-value="modelValue"
            @update:model-value="(e: any) => emit('update:modelValue', e)"
        />
    </BaseSection>
</template>
<script setup lang="ts">
import BaseSection from '../../components/BaseSection.vue';
import SectionTextFullForm from './SectionTextFullForm.vue';
import DrawerTextFull from './DrawerTextFull.vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            content_wide: false,
            text: '',
        }),
    },
});
</script>
