<template>
    <BaseSection wrap>
        <template v-slot:title>
            <DrawerMap preview />
        </template>
        <SectionMapForm
            v-bind="$attrs"
            :model-value="modelValue"
            @update:model-value="(e: any) => emit('update:modelValue', e)"
        />
    </BaseSection>
</template>
<script setup lang="ts">
import BaseSection from '@/modules/content/components/BaseSection.vue';
import SectionMapForm from './SectionMapForm.vue';
import DrawerMap from './DrawerMap.vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            lat: null,
            lng: null,
            zoom: null,
        }),
    },
});
</script>
