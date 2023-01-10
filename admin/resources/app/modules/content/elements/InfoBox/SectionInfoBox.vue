<template>
    <BaseSection wrap>
        <template v-slot:title>
            <DrawerInfoBox preview />
        </template>
        <SectionInfoBoxForm
            v-bind="$attrs"
            :model-value="modelValue"
            @update:model-value="(e: any) => emit('update:modelValue', e)"
        />
    </BaseSection>
</template>
<script setup lang="ts">
import BaseSection from '../../components/BaseSection.vue';
import SectionInfoBoxForm from './SectionInfoBoxForm.vue';
import DrawerInfoBox from '././DrawerInfoBox.vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            title: '',
            text: '',
            content_wide: false,
            link: {
                link: '',
                text: '',
                new_tab: false,
            },
            icon: '',
        }),
    },
});
</script>
