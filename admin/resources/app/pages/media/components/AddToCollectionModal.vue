<template>
    <ContextMenuItem
        @click="isOpen = true"
        :disabled="selection.files.length == 0"
        class="whitespace-nowrap"
    >
        {{ $t('media.add_to_collection') }}
    </ContextMenuItem>
    <Modal lg v-model:open="isOpen" :title="$t('media.add_to_collection')">
        <div class="space-y-3">
            <Select
                :label="$t('media.collection')"
                :options="collectionOptions"
                v-model="collection"
            />
        </div>
        <template v-slot:footer>
            <Button @click="addToCollection" :disabled="!collection">
                {{ $t('media.add') }}
            </Button>
        </template>
    </Modal>
</template>

<script lang="ts" setup>
import { ref, computed } from 'vue';
import { Modal, Select, Button, ContextMenuItem } from '@/ui';
import { selection } from '../modules';
import { MediaCollection } from '@/types/resources';
import { mediaCollectionIndex } from '@/entities';
import { useRouter } from 'vue-router';

const isOpen = ref<boolean>(false);

const collection = ref<MediaCollection>();

const collectionOptions = computed(() => {
    return mediaCollectionIndex.items.map(collection => ({
        value: collection,
        label: collection.title,
    }));
});

const router = useRouter();

const addToCollection = () => {
    if (!collection.value) return;

    selection.addToCollection(collection.value);

    isOpen.value = false;

    // clear selection
    selection.files = [];

    router.push(`/media/${collection.value.key}`);
};
</script>
