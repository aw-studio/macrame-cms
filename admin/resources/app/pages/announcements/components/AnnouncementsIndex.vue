<template>
    <Index :table="announcementIndex" :busy="announcementIndex.isLoading">
        <Table :table="(announcementIndex as any)">
            <template v-slot:thead>
                <Tr>
                    <Th :table="announcementIndex" sort-by="title">Titel</Th>
                    <Th :table="announcementIndex" sort-by="author">Autor</Th>
                    <Th :table="announcementIndex" sort-by="publish_at">VÖ</Th>
                </Tr>
            </template>
            <template v-slot:tbody>
                <Tr
                    v-for="item in announcementIndex.items"
                    :link="`/announcements/${item.id}`"
                    :key="item.id"
                >
                    <Td>{{ item.attributes.title }}</Td>
                    <Td>{{ item.author.name }}</Td>
                    <Td>
                        <span class="whitespace-nowrap">
                            {{ item.publish_at?.label }}
                        </span>
                    </Td>
                </Tr>
            </template>
        </Table>
    </Index>
</template>
<script lang="ts" setup>
import { announcementIndex } from '@/entities';
import { Index, Table, Tr, Td, Th, Badge } from '@/ui';
</script>
