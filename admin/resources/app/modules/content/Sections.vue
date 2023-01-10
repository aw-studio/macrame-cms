<template>
    <Draggable
        v-if="value"
        v-model="value"
        v-bind="dragOptions"
        :group="group"
        itemKey="uuid"
        :component-data="{
            name: !drag ? 'flip-list' : null,
            wrap: true,
        }"
        @start="drag = true"
        @end="drag = false"
        handle=".handle"
    >
        <template #item="{ element }">
            <div>
                <component
                    :is="sections[getSectionKey(element.component) as any]"
                    :modelValue="element.value"
                    @update:modelValue="(e: any) => updateElement(element, e)"
                    @destroy="(e: any) => removeElement(element)"
                />
            </div>
        </template>
    </Draggable>
</template>

<script lang="ts" setup>
import {
    ref,
    watch,
    PropType,
    Component as VueComponent,
    FunctionalComponent,
} from 'vue';
import Draggable from 'vuedraggable';
import { TSection, Model, DragOptions } from '@macramejs/macrame-vue3';
import { v4 as uuid } from 'uuid';

type TSections = {
    [k: string]: VueComponent | FunctionalComponent;
}[];

type DraggableSection = {
    uuid: string;
    component: any;
    key?: string;
    value?: Model;
};

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: {
        type: Array as PropType<TSection[]>,
        required: true,
    },
    sections: {
        type: Object as PropType<TSections>,
        required: true,
    },
    group: {
        type: String,
        default: 'sections',
    },
    dragOptions: {
        type: Object as PropType<DragOptions>,
        default: () => ({
            animation: 200,
            ghostClass: 'ghost',
        }),
    },
});
const drag = ref<boolean>(false);

const updateElement = (element: any, value: any) => {
    element.value = value;
};

const getSectionKey = (section: any): string => {
    const json = JSON.stringify(section);

    for (let key in props.sections) {
        if (JSON.stringify(props.sections[key]) == json) {
            return key;
        }
    }

    return '';
};

const removeElement = (element: any) => {
    value.value = value.value.filter(section => {
        return section.uuid != element.uuid;
    });
};

const parseValue = (value: TSection[]) => {
    let b = [];

    for (let i in value) {
        b.push({
            uuid: uuid(),
            key: value[i].type,
            value: value[i].value,
            component: props.sections[value[i].type as any],
        });
    }

    return b;
};

const defaultValue = (value: any, i: any) => {
    let defaultValue = value[i].component.props.modelValue.default();
    if (Object.keys(defaultValue).length < 1) {
        console.error('No default keys set in Section');
    }

    return defaultValue;
};

const transformValue = (value: DraggableSection[]) => {
    let b: TSection[] = [];

    for (let i in value) {
        b.push({
            type: getSectionKey(value[i].component),
            value: value[i].value || defaultValue(value, i),
        });
    }

    return b;
};

const value = ref<DraggableSection[]>(parseValue(props.modelValue));

watch(
    () => value,
    () => emit('update:modelValue', transformValue(value.value)),
    { deep: true }
);
</script>
