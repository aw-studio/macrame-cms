<template>
    <div
        class="flex w-screen h-screen max-h-screen"
        v-if="true"
        :class="{ filedrag: fileDrag }"
    >
        <SidebarPrimary :locked="locked">
            <template v-slot="{ expanded }">
                <SidebarSection
                    :title="section.title"
                    :expanded="expanded"
                    v-for="section in sidebarPrimarySections"
                >
                    <template v-for="(item, index) in section.items">
                        <router-link
                            :to="item.to"
                            v-slot="{ isActive }"
                            v-if="item.show"
                            :key="index"
                        >
                            <Link :hide-title="!expanded" :active="isActive">
                                <template v-slot:icon>
                                    <component
                                        :is="item.icon"
                                        class="w-4 h-4"
                                    />
                                </template>
                                {{ item.title }}
                            </Link>
                        </router-link>
                    </template>
                </SidebarSection>
                <SidebarSection class="mt-auto" :expanded="expanded">
                    <router-link to="/system" v-slot="{ isActive }">
                        <Link :hide-title="!expanded" :active="isActive">
                            <template v-slot:icon>
                                <IconSettings class="w-4 h-4" />
                            </template>
                            {{ $t('layout.system') }}
                        </Link>
                    </router-link>
                </SidebarSection>
            </template>
        </SidebarPrimary>
        <router-view />
    </div>
    <Toast />
</template>

<script lang="ts" setup>
import { computed, ref } from 'vue';
import Toast from '@/modules/toast/Toast.vue';
import SidebarPrimary from './components/SidebarPrimary/SidebarPrimary.vue';
import SidebarSection from './components/SidebarPrimary/SidebarSection.vue';
import Link from './components/SidebarPrimary/Link.vue';
import IconSettings from '@/ui/Icons/IconSettings.vue';
import config from '@/config/';

const locked = computed(() => {
    if (localStorage.hasOwnProperty('sideBarLocked')) {
        return JSON.parse(localStorage.getItem('sideBarLocked') as string);
    }
    return false;
});

const fileDrag = ref<boolean>(false);

window.addEventListener('dragover', (event: Event) => {
    fileDrag.value = true;
    event.preventDefault();
});
window.addEventListener('dragleave', (event: Event) => {
    fileDrag.value = false;
    event.preventDefault();
});

const sidebarPrimarySections = config.sidebar.useSidebarPrimarySections();
</script>
