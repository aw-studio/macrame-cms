<template>
    <div class="w-full">
        <BaseInput class="w-full" v-bind="$attrs" type="range" />
        <div class="flex justify-between w-full mt-2 text-sm text-gray-500">
            <span class="inline-block">
                {{ $attrs.min }}
            </span>
            <span class="inline-block">
                {{ $attrs.max }}
            </span>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { Input as BaseInput } from '@macramejs/macrame-vue3';
</script>

<style scoped>
input[type='range'] {
    -webkit-appearance: none;
    width: 100%;
    background: transparent;
}
input[type='range']:focus {
    outline: none;
}
input[type='range']::-webkit-slider-runnable-track {
    width: 100%;
    height: 3px;
    cursor: pointer;
    background: #ffd4aa;
}
input[type='range']::-webkit-slider-thumb {
    height: 18px;
    width: 18px;
    border-radius: 9999px;
    cursor: pointer;
    -webkit-appearance: none;
    margin-top: -8px;
    background: #fead5e;
}
input[type='range']:focus::-webkit-slider-runnable-track {
    background: #ffd4aa;
}
input[type='range']::-moz-range-track {
    width: 100%;
    height: 3px;
    cursor: pointer;
    background: #ffd4aa;
}
input[type='range']::-moz-range-thumb {
    height: 18px;
    width: 18px;
    border-radius: 9999px;
    border: 0;
    cursor: pointer;
    background: #fead5e;
}
input[type='range']::-ms-track {
    width: 100%;
    height: 3px;
    cursor: pointer;
    background: transparent;
    border-color: transparent;
    border-width: 16px 0;
    color: transparent;
}
input[type='range']::-ms-fill-lower {
    background: #fead5e;
}
input[type='range']::-ms-fill-upper {
    background: #fead5e;
}
input[type='range']::-ms-thumb {
    height: 18px;
    width: 18px;
    border-radius: 9999px;
    background: #fead5e;
    cursor: pointer;
}
input[type='range']:focus::-ms-fill-lower {
    background: #ffd4aa;
}
input[type='range']:focus::-ms-fill-upper {
    background: #ffd4aa;
}
</style>
