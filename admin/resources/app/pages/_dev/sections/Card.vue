<template>
    <div class="grid grid-cols-2 gap-5 pb-10 mb-16 border-b border-gray-400">
        <div class="col-span-full md:col-span-1">
            <h2 class="mb-4 text-xl font-semibold">Card.vue</h2>
            <div class="flex gap-5 mb-10">
                <Card>Test</Card>
            </div>
        </div>
        <div class="col-span-full md:col-span-1">
            <CopyString value="<Card>Test</Card>" label="Template" />
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
                    <td class="py-5 pl-5">as</td>
                    <td class="py-5 font-code">div</td>
                    <td class="py-5 pr-5">
                        which element the card should be rendered as
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">variant</td>
                    <td class="py-5 font-code">white</td>
                    <td class="py-5 pr-5">
                        determines the background color of the card (options:
                        white, gray)
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">sm</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">sets padding to 32px</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">md</td>
                    <td class="py-5 font-code">true</td>
                    <td class="py-5 pr-5">sets padding to 48px</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script lang="ts" setup>
import { Card } from '@/ui';
import CopyString from '../CopyString.vue';
</script>
