<template>
    <div class="grid grid-cols-2 gap-5 pb-10 mb-10 border-b border-gray-400">
        <h2 class="mb-4 text-xl font-semibold col-span-full">Badge.vue</h2>
        <div class="col-span-full md:col-span-1">
            <div class="flex gap-5">
                <Badge v-if="variant == 'primary'">Test</Badge>
                <Badge v-if="variant == 'gray'" gray>Test</Badge>
                <Badge v-if="variant == 'pink'" pink>Test</Badge>
                <Badge v-if="variant == 'purple'" purple>Test</Badge>
                <Badge v-if="variant == 'blue'" blue>Test</Badge>
                <Badge v-if="variant == 'lightblue'" lightblue>Test</Badge>
                <Badge v-if="variant == 'orange'" orange>Test</Badge>
                <Badge v-if="variant == 'lightorange'" lightorange>Test</Badge>
                <Badge v-if="variant == 'red'" red>Test</Badge>
                <Badge v-if="variant == 'green'" green>Test</Badge>
                <Badge v-if="variant == 'turkise'" turkise>Test</Badge>
            </div>
            <Select
                class="mt-8"
                label="Variant"
                v-model="variant"
                :options="variantOptions"
            />
        </div>
        <div class="col-span-full md:col-span-1">
            <CopyString
                :value="`<Badge ${variant}>Test</Badge>`"
                label="Template"
            />
        </div>
        <table
            class="table p-5 mt-10 bg-orange-100 border border-orange-300 col-span-full"
        >
            <thead class="text-left border-b border-orange-300">
                <th class="py-5 pl-5">Prop</th>
                <th class="py-5 font-code">Default</th>
                <th class="py-5 pr-5">Description</th>
            </thead>
            <tbody>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">primary</td>
                    <td class="py-5 font-code">true</td>
                    <td class="py-5 pr-5">Sets color of badge to be primary</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">gray</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">Sets color of badge to be gray</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">purple</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">Sets color of badge to be purple</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">blue</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">Sets color of badge to be blue</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">lightblue</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">
                        Sets color of badge to be light blue
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">orange</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">Sets color of badge to be orange</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">lightorange</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">
                        Sets color of badge to be light orange
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">pink</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">Sets color of badge to be pink</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">red</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">Sets color of badge to be red</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">green</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">Sets color of badge to be green</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">turkise</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">Sets color of badge to be turkise</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script lang="ts" setup>
import { Badge, Select } from '@/ui';
import { ref } from 'vue';
import CopyString from '../CopyString.vue';

const variant = ref('primary');
const variantOptions = [
    { value: 'primary', label: 'Primary' },
    { value: 'gray', label: 'Gray' },
    { value: 'purple', label: 'Purple' },
    { value: 'blue', label: 'Blue' },
    { value: 'lightblue', label: 'Light Blue' },
    { value: 'turkise', label: 'Turkise' },
    { value: 'green', label: 'green' },
    { value: 'orange', label: 'orange' },
    { value: 'lightorange', label: 'Light Orange' },
    { value: 'red', label: 'Red' },
    { value: 'pink', label: 'Pink' },
];
</script>
