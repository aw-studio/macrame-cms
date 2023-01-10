<template>
    <div class="relative pl-6 animate-pulse opacity-20">
        <div class="relative flex items-center">
            <div class="flex items-center flex-1 pr-2 rounded">
                <div class="flex items-center px-3">
                    <IconDraggable class="w-2.5 h-2.5 fill-gray" />
                </div>
                <div
                    class="w-2 h-2 mr-2 rounded-full bg-gray"
                    title="online"
                ></div>
                <div class="py-1">
                    <span class="bg-gray rounded h-2 block w-32 my-2"
                        >&nbsp;</span
                    >
                </div>
            </div>
            <div
                class="flex justify-center w-6 text-white cursor-pointer"
            ></div>
        </div>
        <div class="relative"><div class="py-0.5"></div></div>
    </div>
</template>
<script lang="ts" setup>
import IconDraggable from '@/ui/Icons/custom/IconDraggable.vue';
</script>
