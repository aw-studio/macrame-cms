<template>
    <Index :table="systemUserIndex" :busy="systemUserIndex.isLoading">
        <Table :table="(systemUserIndex as any)">
            <template v-slot:thead>
                <Tr>
                    <Th :table="systemUserIndex" sort-by="id">Id</Th>
                    <Th :table="systemUserIndex" sort-by="name">Name</Th>
                    <Th :table="systemUserIndex" sort-by="email">E-Mail</Th>
                    <Th>Rolle</Th>
                </Tr>
            </template>
            <template v-slot:tbody>
                <Tr
                    v-for="user in systemUserIndex.items"
                    :link="`/system/users/${user.id}`"
                    :key="user.id"
                >
                    <Td>{{ user.id }}</Td>
                    <Td>{{ user.name }}</Td>
                    <Td>{{ user.email }}</Td>
                    <Td>
                        <Badge v-if="user.is_admin" red>Admin</Badge>
                    </Td>
                </Tr>
            </template>
        </Table>
    </Index>
</template>
<script lang="ts" setup>
import { systemUserIndex } from '@/entities';
import { Index, Table, Tr, Td, Th, Badge } from '@/ui';
</script>
