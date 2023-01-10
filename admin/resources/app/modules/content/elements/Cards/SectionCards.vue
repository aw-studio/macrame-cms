<template>
    <BaseSection>
        <template v-slot:title>
            <DrawerCards preview />
        </template>
        <SectionCardsForm
            v-bind="$attrs"
            :model-value="modelValue"
            @update:model-value="(e: any) => emit('update:modelValue', e)"
        />
    </BaseSection>
</template>
<script setup lang="ts">
import BaseSection from '../../components/BaseSection.vue';
import DrawerCards from './DrawerCards.vue';
import SectionCardsForm from './SectionCardsForm.vue';

const emit = defineEmits(['update:modelValue']);

defineProps({
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
