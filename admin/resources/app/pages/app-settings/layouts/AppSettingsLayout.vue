<template>
    <SidebarSecondary>
        <template v-slot:header>
            <SidebarSecondaryHeader title="Website Verwaltung">
                <template v-slot:icon>
                    <IconFarm class="w-5 h-5" />
                </template>
            </SidebarSecondaryHeader>
        </template>

        <SidebarSecondarySection>
            <SidebarSecondaryLink
                :key="1"
                :title="$t('layout.redirects')"
                :to="`/app-settings/redirects`"
                class="cursor-pointer"
            />
        </SidebarSecondarySection>
    </SidebarSecondary>
    <Main>
        <router-view />
    </Main>
</template>

<script setup lang="ts">
import { onBeforeMount } from 'vue';
import { SidebarSecondary, SidebarSecondaryHeader } from '@/layout';
import { Main } from '@/layout';
import IconFarm from '@/ui/Icons/IconFarm.vue';
import SidebarSecondarySection from '@/layout/components/SidebarSecondary/SidebarSecondarySection.vue';
import SidebarSecondaryLink from '@/layout/components/SidebarSecondary/SidebarSecondaryLink.vue';

onBeforeMount(() => {});
</script>
