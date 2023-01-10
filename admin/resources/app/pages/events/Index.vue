<template>
    <Main>
        <Topbar>
            <div class="font-semibold">{{ $t('events.events') }}</div>
            <AddEventModal />
        </Topbar>
        <MainBody>
            <MainContent>
                <Index :table="eventIndex" :busy="eventIndex.isLoading">
                    <Table :table="(eventIndex as any)">
                        <template v-slot:thead>
                            <Tr>
                                <Th>Titel</Th>
                                <Th>Datum</Th>
                            </Tr>
                        </template>
                        <template v-slot:tbody>
                            <Tr
                                v-for="item in eventIndex.items"
                                :link="`/events/${item.id}`"
                                :key="item.id"
                            >
                                <Td>
                                    <div>
                                        {{ item.attributes.title }}
                                    </div>

                                    <div class="text-sm text-gray">
                                        {{ item.attributes.location }}
                                    </div>
                                </Td>
                                <Td>
                                    <span>
                                        {{ item.starts_at?.formatted }}
                                    </span>
                                    <span
                                        v-if="item.ends_at?.formatted"
                                        class="px-4"
                                    >
                                        -
                                    </span>
                                    <span>
                                        {{ item.ends_at?.formatted }}
                                    </span>
                                </Td>
                            </Tr>
                        </template>
                    </Table>
                </Index>
            </MainContent>
            <MainSidebar title="Filter" v-model:open="isOpen">
                <template v-slot:icon>
                    <IconInputSearch class="w-4 h-4" />
                </template>
                <MainSidebarSection title="Termine durchsuchen">
                    <Input v-model.debounce="eventIndex.search" />
                    <div v-if="eventIndex.search">
                        {{ eventIndex.meta.total }} Treffer
                    </div>
                </MainSidebarSection>
            </MainSidebar>
        </MainBody>
    </Main>
</template>

<script lang="ts" setup>
import { onMounted, ref } from 'vue';
import { useRoute } from 'vue-router';
import { eventIndex } from '@/entities';
import {
    Main,
    MainBody,
    MainContent,
    MainSidebar,
    MainSidebarSection,
} from '@/layout';
import Topbar from '@/layout/components/Topbar.vue';
import { Index, Table, Tr, Td, Th, Input } from '@/ui';
import AddEventModal from './components/AddEventModal.vue';
import IconInputSearch from '@/ui/Icons/IconInputSearch.vue';

const route = useRoute();

onMounted(() => {
    eventIndex.setPage((route.query.page || 1) as number);
});

const isOpen = ref(true);
</script>
