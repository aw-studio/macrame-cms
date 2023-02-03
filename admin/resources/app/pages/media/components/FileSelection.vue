<template>
    <div class="flex items-center space-x-4">
        <div>{{ $t('media.n_files_selected', selection.files.length) }}</div>
        <div>
            <ContextMenu>
                <template v-slot:button>
                    <InteractionButton class="cursor-pointer" orange>
                        <IconMoreHoriz class="w-4 h-4" />
                    </InteractionButton>
                </template>
                <AddToCollectionModal />
                <ContextMenuItem
                    class="whitespace-nowrap"
                    @click="clearSelection()"
                >
                    {{ $t('media.clear_selection') }}
                </ContextMenuItem>
                <ContextMenuItem
                    @click="deleteSelection()"
                    class="text-red whitespace-nowrap hover:bg-red hover:text-white"
                >
                    {{ $t('media.delete') }}
                </ContextMenuItem>
            </ContextMenu>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { ContextMenu, InteractionButton } from '@/ui';
import IconMoreHoriz from '@/ui/Icons/IconMoreHoriz.vue';
import AddToCollectionModal from './AddToCollectionModal.vue';
import { selection } from '../modules';
import ContextMenuItem from '@/ui/ContextMenuItem.vue';
import { mediaIndex } from '@/entities';

const clearSelection = async () => {
    selection.files = [];
};

const deleteSelection = async () => {
    await selection.delete();
    mediaIndex.load();
    selection.files = [];
};
</script>
