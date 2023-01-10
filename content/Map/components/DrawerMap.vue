<template>
    <Drawer
        title="Google Map"
        hint="Interaktive Karte von Google"
        color="purple"
    >
        <IconMap class="w-4 h-4" />
    </Drawer>
</template>
<script lang="ts" setup>
import Drawer from '@/modules/content/components/BaseDrawer.vue';
import IconMap from '@/ui/Icons/IconMap.vue';
</script>
