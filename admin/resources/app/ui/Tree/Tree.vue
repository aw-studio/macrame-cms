<template>
    <Draggable
        tag="div"
        :list="tree.items"
        handle=".handle"
        v-if="tree"
        class="dragArea"
    >
        <!-- item-key="uuid" -->
        <template #item="{ element }">
            <div class="py-1 pl-2 draggable-wrapper">
                <slot :item="element.value" :children="element.children" />
            </div>
        </template>
    </Draggable>
</template>
<script setup lang="ts">
import Draggable from 'vuedraggable';
import { PropType } from 'vue';
import { Tree } from '@macramejs/macrame-vue3';

defineProps({
    tree: {
        type: Object as PropType<Tree<any, any>>,
        required: true,
    },
});
</script>
