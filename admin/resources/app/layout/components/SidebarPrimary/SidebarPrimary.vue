<template>
    <div
        class="flex flex-col justify-between h-screen overflow-y-scroll transition-all duration-500 bg-gray-900 border-r border-gray-800 whitespace-nowrap"
        @mouseover="expanded = true"
        @mouseleave="expanded = false"
        :class="{
            'w-[72px]': !showSidebar,
            'w-[250px] show-sidebar': showSidebar,
        }"
    >
        <Header />
        <nav class="flex flex-col flex-1">
            <slot v-bind:expanded="showSidebar" />
        </nav>
        <slot name="footer">
            <div class="mt-auto border-t border-gray-800">
                <SidebarSection
                    :title="authedUser.value?.name"
                    :expanded="showSidebar"
                >
                    <Logout :expanded="expanded || showSidebar" />
                </SidebarSection>
            </div>
        </slot>
        <SidebarSection
            class="border-t border-gray-800 hover:bg-opacity-10 hover:bg-orange"
            :expanded="showSidebar"
        >
            <Lock :expanded="expanded || showSidebar" v-model="locked" />
        </SidebarSection>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { computed } from 'vue';
import Header from './Header.vue';
import Lock from './Lock.vue';
import Logout from './Logout.vue';
import { authedUser } from '@/entities';
import SidebarSection from './SidebarSection.vue';

const props = defineProps({
    locked: {
        type: Boolean,
        default: false,
    },
});

const expanded = ref(false);
const locked = ref<boolean>(props.locked);

const showSidebar = computed(() => {
    return expanded.value || locked.value;
});
</script>
