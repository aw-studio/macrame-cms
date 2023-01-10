<template>
    <Main>
        <Topbar>
            <div class="font-semibold">
                {{ $t('announcements.announcements') }}
            </div>
            <AddAnnouncementModal />
        </Topbar>
        <MainBody>
            <IndexContent />
            <MainContent>
                <AnnouncementsIndex />
            </MainContent>
            <IndexSidebar />
        </MainBody>
    </Main>
</template>

<script lang="ts" setup>
import { onMounted } from 'vue';
import { useRoute } from 'vue-router';
import { announcementIndex } from '@/entities';
import { Main, MainBody, MainContent } from '@/layout';
import Topbar from '@/layout/components/Topbar.vue';
import AddAnnouncementModal from './components/AddAnnouncementModal.vue';
import IndexSidebar from './components/IndexSidebar.vue';
import AnnouncementsIndex from './components/AnnouncementsIndex.vue';

const route = useRoute();

onMounted(() => {
    announcementIndex.setPage((route.query.page || 1) as number);
});
</script>
