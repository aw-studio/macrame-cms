<template>
    <BaseSection wrap>
        <template v-slot:title>
            <DrawerImageCarousel preview />
        </template>
        <SectionImageCarouselForm
            v-bind="$attrs"
            :model-value="modelValue"
            @update:model-value="(e: any) => emit('update:modelValue', e)"
        />
    </BaseSection>
</template>
<script setup lang="ts">
import SectionImageCarouselForm from './SectionImageCarouselForm.vue';
import BaseSection from '../../components/BaseSection.vue';
import { watch, reactive } from 'vue';
import { v4 as uuid } from 'uuid';
import DrawerImageCarousel from './DrawerImageCarousel.vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            items: [],
        }),
    },
});
</script>
