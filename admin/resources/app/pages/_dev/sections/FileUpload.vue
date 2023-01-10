<template>
    <div class="grid grid-cols-2 gap-5 pb-10 mb-16 border-b border-gray-400">
        <div class="col-span-full md:col-span-1">
            <h2 class="mb-4 text-xl font-semibold">FileUpload.vue</h2>
            <div class="flex gap-5 mb-10">
                <FileUpload url="/" />
            </div>
        </div>
        <div class="col-span-full md:col-span-1">
            <CopyString value='<FileUpload url="/" />' label="Template" />
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
                    <td class="py-5 pl-5">url</td>
                    <td class="py-5"></td>
                    <td class="py-5 pr-5">
                        url to which the images should be uploaded
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">accept</td>
                    <td class="py-5"></td>
                    <td class="py-5 pr-5">
                        mimetypes which should be supported as Array of strings
                        or simple string
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">disabled</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">
                        sets the disabled state of the file upload
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">maxSize</td>
                    <td class="py-5 font-code">10</td>
                    <td class="py-5 pr-5">
                        sets the maximum file size that can be uploaded in MB
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">maxFiles</td>
                    <td class="py-5 font-code">1</td>
                    <td class="py-5 pr-5">
                        sets the maximum amount of files that can be uploaded
                    </td>
                </tr>
                <tr class="border-b border-orange-300">
                    <td class="py-5 pl-5">multiple</td>
                    <td class="py-5 font-code">false</td>
                    <td class="py-5 pr-5">
                        whether multiple files can be uploaded or not
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script lang="ts" setup>
import { FileUpload } from '@/ui';
import CopyString from '../CopyString.vue';
</script>
