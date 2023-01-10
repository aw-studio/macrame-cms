<template>
    <template v-if="!isLoading && isLoaded">
        <Topbar>
            <MenusTopbarLeft />
            <MenusTopbarRight />
        </Topbar>
        <router-view />
    </template>
    <Loading v-else />
</template>

<script setup lang="ts">
import { computed, watch } from 'vue';
import { useRoute } from 'vue-router';
import MenusTopbarRight from './components/MenusTopbarRight.vue';
import MenusTopbarLeft from './components/MenusTopbarLeft.vue';
import { Topbar, Loading } from '@/layout';
import {
    menuState,
    useMenuItemTree,
    menuItemTree,
    linksState,
    updateMenuItemTree,
} from '@/entities';

const route = useRoute();

const menuId = computed(() => parseInt(route.params.menu as string));

const isLoading = computed(() => {
    return menuState.isLoading && linksState.isLoading;
});

const isLoaded = computed(() => {
    return menuState.isLoaded && menuItemTree.value && linksState.isLoaded;
});

const loadData = () => {
    linksState.load();
    menuState.load(menuId.value).then(menu => {
        menuItemTree.value = useMenuItemTree(menu);

        menuItemTree.value.onOrderChange(order => {
            updateMenuItemTree(menuState.value, { order }, undefined);
        });

        menuItemTree.value.load();
    });
};

watch(() => menuId.value, loadData, { immediate: true });
</script>
