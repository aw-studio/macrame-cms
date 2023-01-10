<template>
    <div class="grid grid-cols-2 gap-5 pb-10 mb-10 border-b border-gray-400">
        <div class="col-span-full md:col-span-1">
            <h2 class="mb-4 text-xl font-semibold">SelectSearch.vue</h2>
            <div class="flex gap-5 mb-10 w-96">
                <SelectSearch
                    v-model="select"
                    labelKey="label"
                    valueKey="value"
                    :options="selectOptions"
                    label="Test"
                    hint="Test"
                />
                <SelectSearch
                    v-model="select"
                    labelKey="label"
                    valueKey="value"
                    disabled
                    :options="selectOptions"
                    label="Test"
                    hint="Test"
                />
            </div>
            <div
                class="bg-orange-100 border w-fit border-orange-300 text-darkorange font-code px-3 py-1.5"
            >
                value: {{ select }}
            </div>
        </div>
        <div class="col-span-full md:col-span-1">
            <CopyString
                value='<Select
    v-model="select"
    labelKey="label"
    valueKey="value"
    :options="selectOptions"
    label="Test"
/>'
                label="Template"
            />
            <CopyString
                value="const select = ref('');
const selectOptions = ref([
    {
        label: 'Foo',
        value: 'Foo',
    },
    {
        label: 'Bar',
        value: 'Bar',
    },
]);"
                label="Script"
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
                    <td class="py-5 pl-5">modelValue</td>
                    <td class="py-5 font-code"></td>
                    <td class="py-5 pr-5">String</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">options</td>
                    <td class="py-5 font-code"></td>
                    <td class="py-5 pr-5">
                        selectable options (array of objects containing a label
                        and a value key)
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">label</td>
                    <td class="py-5 font-code"></td>
                    <td class="py-5 pr-5">label of the select</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">disabled</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">
                        sets the disabled state of the select field
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">labelKey</td>
                    <td class="py-5 font-code">label</td>
                    <td class="py-5 pr-5">
                        name of the key that represents the label visible in the
                        frontend
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">valueKey</td>
                    <td class="py-5 font-code">value</td>
                    <td class="py-5 pr-5">
                        name of the key that represents the value saved in the
                        database
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
import { SelectSearch } from '@/ui';
import { ref } from 'vue';
import CopyString from '../CopyString.vue';

const select = ref('');
const selectOptions = ref([
    {
        label: 'Foo',
        value: 'Foo',
    },
    {
        label: 'Bar',
        value: 'Bar',
    },
]);
</script>
