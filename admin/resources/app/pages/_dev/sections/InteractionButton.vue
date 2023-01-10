<template>
    <div class="grid grid-cols-2 gap-5 pb-10 mb-10">
        <div class="col-span-full md:col-span-1">
            <h2 class="mb-4 text-xl font-semibold">InteractionButton.vue</h2>
            <div class="flex gap-5 mb-10">
                <InteractionButton>.</InteractionButton>
                <InteractionButton disabled>.</InteractionButton>
            </div>
        </div>
        <div class="col-span-full md:col-span-1">
            <CopyString
                value="<InteractionButton>.</InteractionButton>"
                label="Template"
            />
        </div>
        <table
            class="table p-5 mt-10 bg-orange-100 border border-orange-300 col-span-full"
        >
            <thead class="text-left border-b border-orange-300">
                <th class="py-5 pl-5">Prop</th>
                <th class="py-5">Default</th>
                <th class="py-5 pr-5">Description</th>
            </thead>
            <tbody>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">gray</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">
                        Sets the disabled state of the button
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script lang="ts" setup>
import { InteractionButton } from '@/ui';
import CopyString from '../CopyString.vue';
</script>
