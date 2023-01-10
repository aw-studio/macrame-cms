<template>
    <Transition name="slide-fade">
        <slot />
    </Transition>
</template>

<script setup lang="ts"></script>

<style>
/*
  Enter and leave animations can use different
  durations and timing functions.
*/
.slide-fade-enter-active {
    transition: all 0.2s ease-out;
}
.slide-fade-leave-active {
    transition: none;
}

.slide-fade-enter-from {
    transform: translateY(-20px);
    opacity: 0;
}
</style>
