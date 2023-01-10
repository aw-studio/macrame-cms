<template>
    <Transition name="fade">
        <slot />
    </Transition>
</template>

<script setup lang="ts"></script>

<style>
.fade-enter-active {
    transition: all 0.2s ease-out;
}
.fade-leave-active {
    transition: none;
}

.fade-enter-from {
    opacity: 0;
}
</style>
