<template>
    <Draggable
        v-model="drawers"
        :group="{
            name: group,
            pull: 'clone',
            put: false,
        }"
        :sort="false"
        :clone="cloneSection"
        item-key="id"
    >
        <template #item="{ element }">
            <div>
                <component :is="element" />
            </div>
        </template>
    </Draggable>
</template>

<script setup lang="ts">
import { useSlots, onMounted, ref } from 'vue';
import Draggable from 'vuedraggable';
import { v4 as uuid } from 'uuid';

defineProps({
    group: {
        type: String,
        default: 'sections',
    },
});

const slots = useSlots();

const cloneSection: any = (el: any) => ({
    uuid: uuid(),
    component: el.props.draws,
});

onMounted(() => {
    if (slots.default) {
        drawers.value = slots.default();
    }
});

const drawers = ref();
</script>
