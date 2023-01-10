<template>
    <div class="grid grid-cols-2 gap-5 pb-10 mb-10">
        <div class="col-span-full md:col-span-1">
            <h2 class="mb-4 text-xl font-semibold">Wysiwyg.vue</h2>
            <div class="flex gap-5 mb-10">
                <Wysiwyg v-model="wysiwyg" hint="Test" />
            </div>
            <div
                class="bg-orange-100 border w-fit border-orange-300 text-darkorange font-code px-3 py-1.5"
            >
                value: {{ wysiwyg }}
            </div>
        </div>
        <div class="col-span-full md:col-span-1">
            <CopyString
                value='<Wysiwyg v-model="wysiwyg" />'
                label="Template"
            />
            <CopyString value="const wysiwyg = ref('');" label="Script" />
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
                    <td class="py-5 pl-5">modelValue</td>
                    <td class="py-5 font-code"></td>
                    <td class="py-5 pr-5">String</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">errors</td>
                    <td class="py-5 font-code">[]</td>
                    <td class="py-5 pr-5">
                        Array that holds the errors of the field as strings
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script lang="ts" setup>
import { Wysiwyg } from '@/ui';
import { ref } from 'vue';
import CopyString from '../CopyString.vue';

const wysiwyg = ref('');
</script>
