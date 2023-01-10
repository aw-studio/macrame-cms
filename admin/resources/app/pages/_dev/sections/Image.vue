<template>
    <div class="grid grid-cols-2 gap-5 mb-16">
        <div class="col-span-full md:col-span-1">
            <h2 class="mb-4 text-xl font-semibold">ResponsiveImage.vue</h2>
            <div class="flex gap-5 mb-10">
                <ResponsiveImage
                    src="https://images.unsplash.com/photo-1655684936814-f5c04d7a6fa6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80"
                />
            </div>
        </div>
        <div class="col-span-full md:col-span-1">
            <CopyString value='<ResponsiveImage src="" />' label="Template" />
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
                    <td class="py-5 pl-5">open</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">
                        determines wether the modal is visible or not
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">src</td>
                    <td class="py-5 font-code"></td>
                    <td class="py-5 pr-5">url of image</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">sizes</td>
                    <td class="py-5 font-code">[10, 300, 500, 900, 1400]</td>
                    <td class="py-5 pr-5">
                        array of numbers that set the srcset variants
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">cover</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">
                        sets image to use object-cover instead of object-contain
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">overflow</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">allows overflow of image</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script lang="ts" setup>
import { ResponsiveImage } from '@/ui';
import CopyString from '../CopyString.vue';
</script>
