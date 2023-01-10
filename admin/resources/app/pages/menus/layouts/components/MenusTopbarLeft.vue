<template>
    <div class="flex items-baseline">
        <span class="font-semibold">{{ menuState.value.title }}</span>
    </div>
</template>
<script lang="ts" setup>
import { menuState } from '@/entities';
</script>
