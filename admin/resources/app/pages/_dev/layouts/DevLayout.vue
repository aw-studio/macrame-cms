<template>
    <Main>
        <Topbar>
            <!-- <PagesTopbarLeft />
        <PagesTopbarRight /> -->
        </Topbar>
        <Tabs>
            <Tab :to="`/dev`">Dev</Tab>
            <Tab :to="`/dev/buttons`">Buttons</Tab>
            <Tab :to="`/dev/form`">Form</Tab>
            <Tab :to="`/dev/icons`">icons</Tab>
            <Tab :to="`/dev/table`">table</Tab>
        </Tabs>
        <router-view />
    </Main>
</template>

<script setup lang="ts">
import { PropType, computed, onMounted, watch } from 'vue';
import { useRoute } from 'vue-router';
import { Main } from '@/layout';
import { Tabs, Tab, Topbar } from '@/layout';
import { pageForm } from '@/entities';
import { PageTreeResource } from '@/types';

defineProps({
    pages: {
        type: Object as PropType<PageTreeResource>,
        required: true,
    },
});
</script>
