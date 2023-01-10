<template>
    <BaseSection wrap>
        <template v-slot:title>
            <DrawerVideoEmbed preview />
        </template>
        <SectionVideoEmbedForm
            v-bind="$attrs"
            :model-value="modelValue"
            @update:model-value="(e: any) => emit('update:modelValue', e)"
        />
    </BaseSection>
</template>
<script setup lang="ts">
import BaseSection from '@/modules/content/components/BaseSection.vue';
import DrawerVideoEmbed from '././DrawerVideoEmbed.vue';
import SectionVideoEmbedForm from './SectionVideoEmbedForm.vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            id: '',
            content_wide: false,
        }),
    },
});
</script>
