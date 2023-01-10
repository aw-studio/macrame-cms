<template>
    <MainBody>
        <Content v-model="form.content" :sections="sections" />
    </MainBody>
</template>

<script lang="ts" setup>
import { MainBody } from '@/layout';
import { PropType } from 'vue';
import { Content, sections } from '@/modules/content';
import { Block } from '@/types/resources';
import { BlockForm } from '@/types';

const props = defineProps({
    block: {
        type: Object as PropType<Block>,
        required: true,
    },
    form: {
        type: Object as PropType<BlockForm>,
        required: true,
    },
});
</script>
