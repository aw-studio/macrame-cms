<template>
    <Drawer
        title="Download Karten"
        hint="Karten in denen ein Dokument zum Download verlinkt wird."
        color="orange"
    >
        <IconDownload class="w-4 h-4" />
    </Drawer>
</template>
<script lang="ts" setup>
import Drawer from '@/modules/content/components/BaseDrawer.vue';
import IconDownload from '@/ui/Icons/IconDownload.vue';
</script>
