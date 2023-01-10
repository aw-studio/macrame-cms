<template>
    <SidebarSecondary>
        <template v-slot:header>
            <MenuSidebarHeader />
        </template>
        <template v-slot:default>
            <MenuSidebarBody />
        </template>
    </SidebarSecondary>
</template>

<script lang="ts" setup>
import { SidebarSecondary } from '@/layout';
import MenuSidebarHeader from './MenuSidebarHeader.vue';
import MenuSidebarBody from './MenuSidebarBody.vue';
</script>
