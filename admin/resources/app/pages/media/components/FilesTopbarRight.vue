<template>
    <SelectionMenu :selection="selection" />
</template>

<script lang="ts" setup>
import SelectionMenu from './SelectionMenu.vue';
import { selection } from '../modules';
</script>
