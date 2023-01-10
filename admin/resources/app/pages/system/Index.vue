<template>
    <div class="flex items-center justify-center w-full h-screen px-10">
        <Card class="max-w-xl">
            <div class="min-w-[265px]">
                <h2 class="pb-6 text-lg font-bold">Systemverwaltung</h2>
                <p>
                    Hier können Sie die User des Backends verwalten, sie einem
                    Kreisverband zuordnen, sie zu Administratoren machen etc.
                </p>
                <div class="flex justify-center pt-12"></div>
            </div>
        </Card>
    </div>
</template>

<script lang="ts" setup>
import { onMounted } from 'vue';
import { useRoute } from 'vue-router';
import { Main, MainBody, MainContent } from '@/layout';
import Topbar from '@/layout/components/Topbar.vue';
import { Card } from '@/ui';

const route = useRoute();

onMounted(() => {
    //
});
</script>
