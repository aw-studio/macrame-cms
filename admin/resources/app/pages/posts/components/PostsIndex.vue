<template>
    <Index :table="postIndex" :busy="postIndex.isLoading">
        <Table :table="(postIndex as any)">
            <template v-slot:thead>
                <Tr>
                    <Th :table="postIndex" sort-by="title">Titel</Th>
                    <Th :table="postIndex" sort-by="author">Autor</Th>
                    <Th :table="postIndex" sort-by="publish_at">VÖ</Th>
                </Tr>
            </template>
            <template v-slot:tbody>
                <Tr
                    v-for="item in postIndex.items"
                    :link="`/posts/${item.id}`"
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
import { postIndex } from '@/entities';
import { Index, Table, Tr, Td, Th, Badge } from '@/ui';
</script>
