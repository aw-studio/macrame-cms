<template>
    <Topbar>
        <div>{{ $t('system.user_management') }}</div>
        <AddSystemUserModal />
    </Topbar>
    <Main>
        <MainBody>
            <MainContent>
                <SystemUsersIndex />
            </MainContent>
        </MainBody>
    </Main>
</template>

<script lang="ts" setup>
import { onMounted } from 'vue';
import { useRoute } from 'vue-router';
import { systemUserIndex } from '@/entities';
import { Main, MainBody, MainContent } from '@/layout';
import Topbar from '@/layout/components/Topbar.vue';
import SystemUsersIndex from './components/SystemUsersIndex.vue';
import AddSystemUserModal from './components/AddSystemUserModal.vue';
import //
'@/ui';

const route = useRoute();

onMounted(() => {
    systemUserIndex.load();
});
</script>
