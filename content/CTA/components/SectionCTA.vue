<template>
    <BaseSection wrap>
        <template v-slot:title>
            <DrawerCTA preview />
        </template>
        <SectionCTAForm
            v-bind="$attrs"
            :model-value="modelValue"
            @update:model-value="(e: any) => emit('update:modelValue', e)"
        />
    </BaseSection>
</template>
<script setup lang="ts">
import BaseSection from '@/modules/content/components/BaseSection.vue';
import SectionCTAForm from './SectionCTAForm.vue';
import DrawerCTA from './DrawerCTA.vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            important: false,
            content_wide: false,
            link: {
                link: '',
                text: '',
                new_tab: false,
            },
        }),
    },
});
</script>
