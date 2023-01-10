<template>
    <div class="grid grid-cols-2 gap-5 pb-10 mb-10 border-b border-gray-400">
        <div class="col-span-full md:col-span-1">
            <h2 class="mb-4 text-xl font-semibold">Checkbox.vue</h2>
            <div class="flex gap-5 mb-10">
                <Checkbox
                    v-model="checkboxes"
                    value="Test"
                    fieldId="1"
                    label="Test"
                />
            </div>
            <div
                class="bg-orange-100 border w-fit border-orange-300 text-darkorange font-code px-3 py-1.5"
            >
                value: {{ checkboxes }}
            </div>
        </div>
        <div class="col-span-full md:col-span-1">
            <CopyString
                value='<Checkbox v-model="checkboxes" value="Test" fieldId="1" label="Test" />'
                label="Template"
            />
            <CopyString value="const checkboxes = ref([]);" label="Script" />
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
                    <td class="py-5 pr-5">
                        Array of strings to which the value of the checkbox will
                        be pushed
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">value</td>
                    <td class="py-5 font-code"></td>
                    <td class="py-5 pr-5">value of the checkbox as string</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">label</td>
                    <td class="py-5 font-code"></td>
                    <td class="py-5 pr-5">
                        sets the label of the checkbox field
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">fieldId</td>
                    <td class="py-5 font-code"></td>
                    <td class="py-5 pr-5">
                        sets the id of the checkbox input field
                    </td>
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
import { Checkbox } from '@/ui';
import { ref } from 'vue';
import CopyString from '../CopyString.vue';

const checkboxes = ref([]);
</script>
