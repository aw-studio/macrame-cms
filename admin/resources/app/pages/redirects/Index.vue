<template>
    <Main>
        <Topbar>
            <div class="font-semibold">{{ $t('redirects.redirects') }}</div>
            <AddRedirectModal />
        </Topbar>
        <MainBody>
            <MainContent>
                <Index :table="redirectIndex" :busy="redirectIndex.isLoading">
                    <Table :table="(redirectIndex as any)">
                        <template v-slot:thead>
                            <Tr>
                                <Th>Weiterleitungs URL</Th>
                                <Th>Ziel URL</Th>
                                <Th>Art der Weiterleitung</Th>
                                <Th>Aktiv</Th>
                                <Th></Th>
                            </Tr>
                        </template>
                        <template v-slot:tbody>
                            <Tr
                                v-for="item in redirectIndex.items"
                                :key="item.id"
                            >
                                <Td>{{ item.from_url }}</Td>
                                <Td>{{ item.to_url }}</Td>
                                <Td>
                                    <span class="whitespace-nowrap">
                                        {{
                                            getHttpStatusCodeLabel(
                                                item.http_status_code
                                            )
                                        }}
                                    </span>
                                </Td>
                                <Td>
                                    <div class="space-x-2">
                                        <Toggle
                                            v-model="item.active"
                                            @update:model-value="
                                                updateItem(item)
                                            "
                                        />
                                    </div>
                                </Td>
                                <Td>
                                    <div class="space-x-2">
                                        <InteractionButton>
                                            <IconTrash
                                                @click="deleteItem(item)"
                                                class="w-4 h-4"
                                            />
                                        </InteractionButton>
                                    </div>
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
                <MainSidebarSection title="Suche">
                    <Input v-model.debounce="redirectIndex.search" />
                    <div v-if="redirectIndex.search">
                        {{ redirectIndex.meta.total }} Treffer
                    </div>
                </MainSidebarSection>
            </MainSidebar>
        </MainBody>
    </Main>
</template>

<script lang="ts" setup>
import { onMounted, ref } from 'vue';
import { useRoute } from 'vue-router';
import {
    deleteRedirect,
    redirectIndex,
    updateOrCreateRedirect,
} from '@/entities';
import {
    Main,
    MainBody,
    MainContent,
    MainSidebar,
    MainSidebarSection,
} from '@/layout';
import Topbar from '@/layout/components/Topbar.vue';
import {
    Index,
    Table,
    Tr,
    Td,
    Th,
    Input,
    Toggle,
    InteractionButton,
} from '@/ui';
import AddRedirectModal from './components/AddRedirectModal.vue';
import IconInputSearch from '@/ui/Icons/IconInputSearch.vue';
import { Redirect } from '@/types';
import IconTrash from '@/ui/Icons/IconTrash.vue';

const updateItem = (item: Redirect) => {
    updateOrCreateRedirect(item, item.id);
};

const deleteItem = (item: Redirect) => {
    if (
        confirm(
            `Bist du sicher, dass die Weiterleitung ${item.from_url} nach ${item.to_url} gelöscht werden soll?`
        )
    ) {
        deleteRedirect(item.id).then(response => {
            redirectIndex.load();
        });
    }
};

const route = useRoute();

onMounted(() => {
    redirectIndex.setPage((route.query.page || 1) as number);
});

const isOpen = ref(false);

const getHttpStatusCodeLabel = (code: number) => {
    return {
        301: '301 - Permanente Weiterleitung',
        302: '302 - Temporäre Weiterleitung',
    }[code];
};
</script>
