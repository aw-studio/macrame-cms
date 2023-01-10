<template>
    <Card>
        <div class="grid grid-cols-2 gap-5">
            <div class="col-span-1">
                <FormFieldLabel> Text </FormFieldLabel>
                <FormGroup>
                    <Wysiwyg v-model="model.text" label="foo" />
                    <Link v-model="model.link" />
                </FormGroup>
            </div>

            <div class="col-span-1">
                <FormFieldLabel> Bild </FormFieldLabel>
                <FormGroup>
                    <SelectImage v-model="model.image" />
                    <template v-if="model.image?.id">
                        <Input v-model="model.image.title" label="title" />
                        <Input v-model="model.image.alt" label="alt" />
                    </template>
                </FormGroup>
            </div>
        </div>
    </Card>
</template>
<script setup lang="ts">
import { Card, Input, FormGroup, Wysiwyg, FormFieldLabel } from '@/ui';
import SelectImage from '@/modules/media/SelectImage.vue';
import Link from '@/modules/link/Link.vue';

import { watch, reactive } from 'vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            text: '',
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

const model = reactive(props.modelValue);

watch(
    () => model,
    () => emit('update:modelValue', model),
    { deep: true }
);
</script>
