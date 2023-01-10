<template>
    <SidebarSecondarySection>
        <SidebarSecondaryLink
            v-for="menu in menusState.value"
            :key="menu.id"
            :title="menu.title"
            :to="`/media/${menu.id}`"
            secondary
            class="cursor-pointer"
        />
    </SidebarSecondarySection>
</template>

<script lang="ts" setup>
import { SidebarSecondarySection, SidebarSecondaryLink } from '@/layout';
import { menusState } from '@/entities';
</script>
