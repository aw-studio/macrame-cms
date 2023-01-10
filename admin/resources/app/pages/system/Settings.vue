<template>
    <Topbar>
        <div>{{ $t('system.settings') }}</div>
    </Topbar>
    <Main>
        <MainBody>
            <MainContent>
                <Card>
                    <h2 class="mb-8">Datenbank zurücksetzen</h2>
                    <Button @click="resetSystem()">
                        <template v-if="!resetSystemBusyState">
                            Reset
                        </template>
                        <template v-else>
                            <Spinner class="w-4 h-4" />
                        </template>
                    </Button>
                </Card>
            </MainContent>
        </MainBody>
    </Main>
</template>

<script lang="ts" setup>
import { useRoute } from 'vue-router';
import { resetSystem, resetSystemBusyState } from '@/entities';
import { Main, MainBody, MainContent } from '@/layout';
import Topbar from '@/layout/components/Topbar.vue';
import { Button, Card, Spinner } from '@/ui';
</script>
