<template>
    <div class="grid grid-cols-2 gap-5 pb-10 mb-16 border-b border-gray-400">
        <div class="col-span-full md:col-span-1">
            <h2 class="mb-4 text-xl font-semibold">DatePicker.vue</h2>
            <div class="flex gap-5 mb-10">
                <DatePicker v-model="datepicker" label="Test" />
                <DatePicker v-model="datepicker" label="Test" disabled />
            </div>
            <div
                class="bg-orange-100 border w-fit border-orange-300 text-darkorange font-code px-3 py-1.5"
            >
                value: {{ datepicker }}
            </div>
        </div>
        <div class="col-span-full md:col-span-1">
            <CopyString
                value='<DatePicker v-model="datepicker" label="Test" />'
                label="Template"
            />
            <CopyString value="const daterange = ref('');" label="Script" />
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
                    <td class="py-5"></td>
                    <td class="py-5 pr-5">String</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">label</td>
                    <td class="py-5"></td>
                    <td class="py-5 pr-5">label of the Datepicker Input</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">disabled</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">
                        sets the disabled state of the datepicker
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">withTime</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">
                        enables the time selection for a date
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">errors</td>
                    <td class="py-5 font-code">[]</td>
                    <td class="py-5 pr-5">
                        array that holds the errors of the field as strings
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script lang="ts" setup>
import { DatePicker } from '@/ui';
import { ref } from 'vue';
import CopyString from '../CopyString.vue';

const datepicker = ref('');
</script>
