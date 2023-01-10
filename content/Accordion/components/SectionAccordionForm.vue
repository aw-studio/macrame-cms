<template>
    <Card class="flex flex-col gap-8 mb-3">
        <Toggle v-model="model.content_wide" label="Ganze Containerbreite" />
        <Input v-model="model.headline" label="Überschrift" />
    </Card>
    <div class="pb-6 space-y-3">
        <Draggable
            tag="div"
            :list="model.items"
            handle=".drag-logo"
            item-key="_draggableKey"
            v-if="model"
        >
            <template #item="{ element, index }">
                <Card class="mb-3" :key="index">
                    <Header class="mb-6">
                        <div class="flex items-center space-x-4">
                            <InteractionButton
                                class="cursor-move drag-logo"
                                gray
                            >
                                <IconDraggable class="w-2.5 h-2.5" />
                            </InteractionButton>
                            <div class="text-lg font-semibold">
                                {{ element.title }}
                            </div>
                        </div>
                        <ContextMenu placement="left">
                            <template #button>
                                <InteractionButton class="cursor-pointer">
                                    <IconMoreHoriz class="w-4 h-4" />
                                </InteractionButton>
                            </template>
                            <ContextMenuItem
                                class="hover:bg-red-signal text-red-signal hover:text-white"
                                @click="removeItem(index)"
                            >
                                <template #icon>
                                    <IconTrash class="origin-left scale-75" />
                                </template>
                                <span>Löschen</span>
                            </ContextMenuItem>
                        </ContextMenu>
                    </Header>
                    <div class="col-span-6 space-y-4">
                        <Input v-model="element.title" label="Title" />
                        <Wysiwyg v-model="element.text" label="Text" />
                    </div>
                </Card>
            </template>
        </Draggable>
    </div>
    <div class="flex justify-center">
        <AddItemButton @click="addItem"> Element hinzufügen </AddItemButton>
    </div>
</template>
<script setup lang="ts">
import IconMoreHoriz from '@/ui/Icons/IconMoreHoriz.vue';
import IconDraggable from '@/ui/Icons/custom/IconDraggable.vue';
import IconTrash from '@/ui/Icons/IconTrash.vue';
import {
    AddItemButton,
    Card,
    InteractionButton,
    Input,
    Wysiwyg,
    Header,
    Toggle,
    ContextMenu,
    ContextMenuItem,
} from '@/ui';
import { v4 as uuid } from 'uuid';
import Draggable from 'vuedraggable';

import { watch, reactive, computed } from 'vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            headline: '',
            content_wide: false,
            items: [],
        }),
    },
});

const model = reactive({
    headline: props.modelValue.headline,
    content_wide: props.modelValue.content_wide,
    items: props.modelValue.items.map((item: any) => {
        return { ...item, _draggableKey: uuid() };
    }),
});

function addItem() {
    model.items.push({
        title: '',
        text: '',
        // _draggableKey: uuid(),
    });
}

function removeItem(index: any) {
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
