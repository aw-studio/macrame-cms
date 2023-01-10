<template>
    <Drawer title="Block" :hint="$t('blocks.reusable_blocks')" color="blue">
        <IconReportColumns class="w-4 h-4" />
    </Drawer>
</template>
<script lang="ts" setup>
import Drawer from '../../components/BaseDrawer.vue';
import IconReportColumns from '@/ui/Icons/IconReportColumns.vue';
</script>
