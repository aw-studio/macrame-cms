<template>
    <div class="grid h-screen grid-cols-1 md:grid-cols-2">
        <div
            class="flex flex-col items-center justify-center h-screen col-span-1"
        >
            <Logo dark show class="!h-10 mb-12" />
            <div class="flex justify-center w-full">
                <slot />
            </div>
        </div>
        <AnimatedBackground />
    </div>
</template>

<script lang="ts" setup>
import Logo from './components/SidebarPrimary/Logo.vue';
import AnimatedBackground from './AnimatedBackground.vue';
//
</script>

<style>
.gradient {
    background: linear-gradient(180deg, #1f1f2c, #0e0e1a);
}
</style>
