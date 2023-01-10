<template>
    <BaseSection wrap>
        <template v-slot:title>
            <DrawerTextImage preview />
        </template>
        <SectionTextImageForm
            v-bind="$attrs"
            :model-value="modelValue"
            @update:model-value="(e: any) => emit('update:modelValue', e)"
        />
    </BaseSection>
</template>
<script setup lang="ts">
import BaseSection from '@/modules/content/components/BaseSection.vue';
import SectionTextImageForm from './SectionTextImageForm.vue';
import DrawerTextImage from './DrawerTextImage.vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            text: '',
            content_wide: false,
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
