<template>
    <div class="grid grid-cols-2 gap-5 pb-10 mb-10 border-b border-gray-400">
        <div class="col-span-full md:col-span-1">
            <h2 class="mb-4 text-xl font-semibold">Slider.vue</h2>
            <div class="flex gap-5 mb-10 w-96">
                <Slider
                    v-model="slider"
                    min="0"
                    max="100"
                    label="Test"
                    hint="Test"
                />
            </div>
            <div
                class="bg-orange-100 border w-fit border-orange-300 text-darkorange font-code px-3 py-1.5"
            >
                value: {{ slider }}
            </div>
        </div>
        <div class="col-span-full md:col-span-1">
            <CopyString
                value='<Slider
    v-model="slider"
    min="0"
    max="100"
    label="Test"
/>'
                label="Template"
            />
            <CopyString value="const slider = ref(0);" label="Script" />
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
                    <td class="py-5 pr-5">Number</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">min</td>
                    <td class="py-5 font-code"></td>
                    <td class="py-5 pr-5">min value of slider</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">max</td>
                    <td class="py-5 font-code"></td>
                    <td class="py-5 pr-5">max value of slider</td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">step</td>
                    <td class="py-5 font-code">1</td>
                    <td class="py-5 pr-5">
                        amount by which the slider should incrment
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script lang="ts" setup>
import { Slider } from '@/ui';
import { ref } from 'vue';
import CopyString from '../CopyString.vue';

const slider = ref(0);
</script>
