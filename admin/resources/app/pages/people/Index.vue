<template>
    <Main>
        <Topbar>
            <div class="font-semibold">{{ $t('people.people') }}</div>
            <AddPersonModal />
        </Topbar>
        <MainBody>
            <MainContent>
                <Index :table="peopleIndex" :busy="peopleIndex.isLoading">
                    <Table :table="(peopleIndex as any)">
                        <template v-slot:thead>
                            <Tr>
                                <Th slim></Th>
                                <Th>Name</Th>
                                <Th>Email</Th>
                                <Th></Th>
                            </Tr>
                        </template>
                        <template v-slot:tbody>
                            <Tr
                                v-for="item in peopleIndex.items"
                                :key="item.id"
                                :link="`/people/${item.id}`"
                            >
                                <Td slim>
                                    <Image
                                        :id="item.image?.id"
                                        :key="item.image?.id"
                                        class="w-24 rounded"
                                    />
                                </Td>
                                <Td>{{ item.name }}</Td>
                                <Td>{{ item.email }}</Td>
                                <Td>
                                    <ContextMenu>
                                        <template v-slot:button>
                                            <button
                                                class="p-1 text-gray-100 opacity-0 hover:bg-black rounded-xs group-hover:opacity-100"
                                            >
                                                <IconMoreHoriz
                                                    class="w-4 h-4"
                                                />
                                            </button>
                                        </template>
                                        <ContextMenuItem
                                            class="hover:bg-red-signal hover:text-white text-red-signal"
                                            @click="deletePage(item.id)"
                                        >
                                            <template #icon>
                                                <IconTrash
                                                    class="origin-left scale-75"
                                                />
                                            </template>
                                            <span>{{
                                                $t('pages.delete')
                                            }}</span>
                                        </ContextMenuItem>
                                    </ContextMenu>
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
                <MainSidebarSection title="Personen durchsuchen">
                    <Input v-model="peopleIndex.search" />
                    <div v-if="peopleIndex.search">
                        {{ peopleIndex.meta.total }} Treffer
                    </div>
                </MainSidebarSection>
            </MainSidebar>
        </MainBody>
    </Main>
</template>

<script lang="ts" setup>
import { peopleIndex, deletePage } from '@/entities';
import {
    Main,
    MainBody,
    MainContent,
    MainSidebar,
    MainSidebarSection,
} from '@/layout';
import { onMounted, ref } from 'vue';
import Topbar from '@/layout/components/Topbar.vue';
import { Index, Table, Tr, Td, Th } from '@/ui';
import { ContextMenu, ContextMenuItem } from '@/ui';
import IconMoreHoriz from '@/ui/Icons/IconMoreHoriz.vue';
import IconInputSearch from '@/ui/Icons/IconInputSearch.vue';
import { Input } from '@/ui';
import { useRoute } from 'vue-router';
import Image from '@/modules/media/Image.vue';
import AddPersonModal from './components/AddPersonModal.vue';

const route = useRoute();

onMounted(() => {
    peopleIndex.setPage((route.query.page || 1) as number);
});

const isOpen = ref(true);
</script>
