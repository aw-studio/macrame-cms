<template>
    <div
        class="flex flex-col justify-between h-screen w-[320px] border-r border-gray-700 sidebar-secondary"
    >
        <header
            class="flex items-center justify-between h-[80px] px-5 text-gray-100 sidebar-secondary-header mb-8"
        >
            <slot name="header" />
        </header>
        <nav class="flex-1 max-h-[calc(100vh - 80px)] overflow-y-auto">
            <slot />
        </nav>
    </div>
</template>

<script lang="ts" setup></script>

<style>
.sidebar-secondary {
    background: linear-gradient(180deg, #1f1f2c, #0e0e1a);
}
.sidebar-secondary-header {
    border-bottom: 1px solid hsl(0deg 0% 100% / 10%);
}
</style>
