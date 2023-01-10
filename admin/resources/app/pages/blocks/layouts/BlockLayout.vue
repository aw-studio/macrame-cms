<template>
    <template v-if="show">
        <Topbar>
            <div class="font-semibold">{{ blockForm.name }}</div>
            <Button @click="submit()" :disabled="!blockForm.isDirty">
                save
            </Button>
        </Topbar>
        <router-view />
    </template>
    <Loading v-else />
</template>

<script setup lang="ts">
import { Topbar, Loading } from '@/layout';
import { Button } from '@/ui';
import { blockForm, useBlockForm } from '@/entities';
import { blockState } from '@/entities';
import { computed, ref, watch } from 'vue';
import { useRoute } from 'vue-router';

const show = ref(false);

const route = useRoute();

const blockId = computed(() => parseInt(route.params.block as string));

const loadData = () => {
    if (blockId.value) {
        show.value = false;
        blockState.load(blockId.value).then(block => {
            blockForm.value = useBlockForm(block);
            show.value = true;
        });
    }
};

watch(() => blockId.value, loadData, { immediate: true });

const submit = () => {
    blockForm.value.submit();
};
</script>
