<template>
    <Main>
        <Topbar>
            <div class="font-semibold">
                {{ $t('posts.posts') }}
            </div>
            <AddPostModal />
        </Topbar>
        <MainBody>
            <IndexContent />
            <MainContent>
                <PostsIndex />
            </MainContent>
            <IndexSidebar />
        </MainBody>
    </Main>
</template>

<script lang="ts" setup>
import { onMounted } from 'vue';
import { useRoute } from 'vue-router';
import { postIndex } from '@/entities';
import { Main, MainBody, MainContent } from '@/layout';
import Topbar from '@/layout/components/Topbar.vue';
import AddPostModal from './components/AddPostModal.vue';
import IndexSidebar from './components/IndexSidebar.vue';
import PostsIndex from './components/PostsIndex.vue';

const route = useRoute();

onMounted(() => {
    postIndex.setPage((route.query.page || 1) as number);
});
</script>
