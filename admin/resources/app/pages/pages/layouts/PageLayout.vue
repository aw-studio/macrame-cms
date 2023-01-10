<template>
    <template v-if="show">
        <Topbar>
            <PagesTopbarLeft />
            <PagesTopbarRight />
        </Topbar>
        <Tabs>
            <Tab :to="`/pages/edit/${pageId}`">{{ $t('pages.content') }}</Tab>
            <Tab :to="`/pages/edit/${pageId}/meta`">Meta</Tab>
            <Tab :to="`/pages/edit/${pageId}/settings`">{{
                $t('pages.settings')
            }}</Tab>
            <!-- <Tab :to="`/pages/edit/${pageId}/audits`">{{ -->
            <!--     $t('pages.versions') -->
            <!-- }}</Tab> -->
        </Tabs>
        <router-view />
    </template>
    <Loading v-else />
</template>

<script setup lang="ts">
import { watch, computed, ref, onBeforeUnmount } from 'vue';
import { useRoute } from 'vue-router';
import PagesTopbarRight from './components/PagesTopbarRight.vue';
import PagesTopbarLeft from './components/PagesTopbarLeft.vue';
import { Tabs, Tab, Topbar, Loading } from '@/layout';
import { usePageForm, pageForm } from '@/entities';
import { pageState } from '@/entities';

const route = useRoute();

const pageId = computed(() => parseInt(route.params.page as string));

const show = ref<boolean>(false);

const loadData = () => {
    show.value = false;
    pageState.load(pageId.value).then(page => {
        if (Array.isArray(page.attributes)) {
            page.attributes = {};
        }
        pageForm.value = usePageForm(page);
        show.value = true;
    });

    // pageTree.load(pageId.value);
};

onBeforeUnmount(() => {
    // pageTree.load();
});

// watch the route param in order to load data
watch(
    () => pageId.value,
    id => {
        // should not be loaded when namespace is left
        if (id) {
            loadData();
        }
    },
    { immediate: true }
);
</script>
