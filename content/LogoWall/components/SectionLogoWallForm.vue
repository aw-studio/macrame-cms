<template>
    <Card class="mb-3">
        <Input v-model="model.headline" label="Überschrift" />
    </Card>
    <div class="pb-6 space-y-3">
        <Draggable
            tag="div"
            class="grid grid-cols-3 gap-5"
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
                                {{ element.name || 'Logo' }}
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
                    <div class="space-y-4">
                        <SelectImage v-model="element.image" />
                        <Input v-model="element.name" label="Name" />
                        <Link v-model="element.link" label="Link" />
                    </div>
                </Card>
            </template>
        </Draggable>
    </div>
    <div class="flex justify-center">
        <AddItemButton @click="addItem"> Neues Logo hinzufügen </AddItemButton>
    </div>
</template>
<script setup lang="ts">
import Link from '@/modules/link/Link.vue';
import {
    AddItemButton,
    Card,
    InteractionButton,
    Input,
    Header,
    ContextMenu,
    ContextMenuItem,
} from '@/ui';
import IconMoreHoriz from '@/ui/Icons/IconMoreHoriz.vue';
import IconDraggable from '@/ui/Icons/custom/IconDraggable.vue';
import IconTrash from '@/ui/Icons/IconTrash.vue';
import Draggable from 'vuedraggable';
import SelectImage from '@/modules/media/SelectImage.vue';
import { v4 as uuid } from 'uuid';
import { reactive, watch } from 'vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Object,
        required: true,
        default: () => ({
            headline: '',
            items: [],
        }),
    },
});

const model = reactive({
    headline: props.modelValue.headline,
    items: props.modelValue.items.map((item: any) => {
        return { ...item, _draggableKey: uuid() };
    }),
});

function addItem() {
    model.items.push({
        name: '',
        _draggableKey: uuid(),
        link: {
            link: '',
            text: '',
            new_tab: false,
        },
        image: {
            id: null,
            title: '',
            alt: '',
        },
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
