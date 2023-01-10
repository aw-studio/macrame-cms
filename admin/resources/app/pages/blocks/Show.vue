<template>
    <MainBody>
        <MainContent>
            <div>
                <Content
                    v-model="blockForm.content"
                    :sections="sections"
                    v-if="!blockState.isLoading"
                />
            </div>
            <div class="mt-4">
                <Button secondary @click="del"> Block löschen. </Button>
            </div>
        </MainContent>
        <MainSidebar v-model:open="isOpen">
            <Drawers />
        </MainSidebar>
    </MainBody>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { MainBody, MainContent, MainSidebar } from '@/layout';
import { Drawers, sections, Content } from '@/modules/content';
import { blockForm, blockState, blocksState, deleteBlock } from '@/entities';
import { useRoute, useRouter } from 'vue-router';
import { Button } from '@/ui';

const route = useRoute();
const router = useRouter();

const isOpen = ref(true);

const del = () => {
    let id = parseInt(route.params.block as string);
    if (
        confirm(
            `Bist du sicher, dass der Block ${blockForm.value.name} gelöscht werden soll?`
        )
    ) {
        deleteBlock(id).then(response => {
            router.push(`/blocks`);
            blocksState.load();
        });
    }
};
</script>
