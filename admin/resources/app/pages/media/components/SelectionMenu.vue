<template>
    <ContextMenu placement="bottom" customButton>
        <template #button>
            <slot name="button">
                <Button secondary :disabled="selection.files.length == 0">
                    {{ $t('media.edit_selection') }}
                </Button>
            </slot>
        </template>

        <AddToCollectionModal
            :selection="selection"
        />

        <ContextMenuDivider />

        <ContextMenuItem
            class="text-red-signal hover:bg-red-signal"
            @click="selection.delete()"
        >
            <template #icon>
                <IconTrash class="origin-left scale-75" />
            </template>
            <span>{{ $t('media.delete') }}</span>
        </ContextMenuItem>
    </ContextMenu>
</template>
<script lang="ts" setup>
import { Button, ContextMenu, ContextMenuItem, ContextMenuDivider } from '@/ui';
import IconTrash from '@/ui/Icons/IconTrash.vue';
import { PropType } from 'vue';
import { Selection } from '../modules';
import AddToCollectionModal from './AddToCollectionModal.vue';

const props = defineProps({
    selection: {
        type: Object as PropType<Selection>,
        required: true,
    },
});
</script>
