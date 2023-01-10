<template>
    <div class="grid grid-cols-2 gap-5 pb-10 mb-10 border-b border-gray-400">
        <div class="col-span-full md:col-span-1">
            <h2 class="mb-4 text-xl font-semibold">RadioGroup.vue</h2>
            <div class="flex gap-5 mb-10">
                <RadioGroup
                    v-model="radioGroup"
                    labelKey="label"
                    valueKey="value"
                    :options="radioOptions"
                    label="Test"
                    hint="Test"
                />
            </div>
            <div
                class="bg-orange-100 border w-fit border-orange-300 text-darkorange font-code px-3 py-1.5"
            >
                value: {{ radioGroup }}
            </div>
        </div>
        <div class="col-span-full md:col-span-1">
            <CopyString
                value='<RadioGroup
    v-model="radioGroup"
    labelKey="label"
    valueKey="value"
    :options="radioOptions"
    label="Test"
/>'
                label="Template"
            />
            <CopyString
                value="const radioGroup = ref('');
const radioOptions = ref([
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
                    <td class="py-5 pr-5">String | Number</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">labelKey</td>
                    <td class="py-5 font-code"></td>
                    <td class="py-5 pr-5">
                        name of the key that represents the label visible in the
                        frontend
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">valueKey</td>
                    <td class="py-5 font-code"></td>
                    <td class="py-5 pr-5">
                        name of the key that represents the value saved in the
                        database
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">disabledKey</td>
                    <td class="py-5 font-code"></td>
                    <td class="py-5 pr-5">
                        name of the key that determines wether or not an option
                        should be disabled
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
import { RadioGroup } from '@/ui';
import { ref } from 'vue';
import CopyString from '../CopyString.vue';

const radioGroup = ref('');
const radioOptions = ref([
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
