<template>
    <Card class="grid grid-cols-1 gap-5 mb-3">
        <Input v-model="model.headline" label="Überschrift" />
        <Textarea v-model="model.text" label="Text" />
    </Card>
    <Card>
        <Draggable
            tag="div"
            class="grid grid-cols-4 gap-5"
            :list="model.items"
            item-key="_draggableKey"
            v-if="model"
        >
            <template #item="{ element, index }">
                <SelectImage v-model="element.image" />
            </template>
        </Draggable>
    </Card>
    <div class="flex justify-center mt-6">
        <AddItemButton @click="addItem"> Bild hinzufügen </AddItemButton>
    </div>
</template>
<script setup lang="ts">
import { AddItemButton, Card, Input, Textarea } from '@/ui';
import { v4 as uuid } from 'uuid';
import Draggable from 'vuedraggable';
import SelectImage from '@/modules/media/SelectImage.vue';

import { watch, reactive } from 'vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            headline: '',
            text: '',
            items: [],
        }),
    },
});

const model = reactive({
    headline: props.modelValue.headline,
    text: props.modelValue.text,
    items: props.modelValue.items?.map((item: any) => {
        return { ...item, _draggableKey: uuid() };
    }) || []
});

function addItem() {
    model.items.push({
        name: '',
        link: '',
        _draggableKey: uuid(),
        image: {
            id: null,
            title: '',
            alt: '',
        },
    });
}

function removeItem(index: number | string) {
    model.items.splice(index, 1);
}

watch(
    () => model,
    () => {
        let items = JSON.parse(JSON.stringify(model.items)).map((item: any) => {
            delete item._draggableKey;

            return item;
        });

        emit('update:modelValue', {
            ...model,
            items,
        });
    },
    { deep: true }
);
</script>
