<template>
    <div
        :class="{
            'pt-4': label,
        }"
    >
        <div class="font-bold" v-if="label">{{ label }}</div>
        <div
            class="relative flex justify-between bg-indigo-900 border border-orange-300 rounded cursor-pointer hover:border-orange-500"
            :class="{
                'text-white ': !copied,
                'text-orange ': copied,
            }"
            @click="copy()"
        >
            <textarea
                type="text"
                ref="input"
                readonly
                style="resize: none"
                rows="6"
                class="flex-1 px-4 py-3 bg-indigo-900 border-none rounded-l outline-none pointer-events-none font-code"
                v-on:focus="handleFocus"
                :value="value"
            />

            <div
                class="flex items-center justify-center w-5 h-5 mx-4 mt-4 rounded-full w-15"
                :class="{
                    'text-white': !copied,
                    'bg-transparent border border-green text-green': copied,
                }"
            >
                <svg
                    v-if="!copied"
                    class="w-4 h-4"
                    width="24"
                    height="24"
                    stroke-width="1.5"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M19.4 20H9.6C9.26863 20 9 19.7314 9 19.4V9.6C9 9.26863 9.26863 9 9.6 9H19.4C19.7314 9 20 9.26863 20 9.6V19.4C20 19.7314 19.7314 20 19.4 20Z"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M15 9V4.6C15 4.26863 14.7314 4 14.4 4H4.6C4.26863 4 4 4.26863 4 4.6V14.4C4 14.7314 4.26863 15 4.6 15H9"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>

                <Transition name="slide-fade">
                    <svg
                        v-if="copied"
                        class="w-3 h-3"
                        width="24"
                        height="24"
                        stroke-width="1.5"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M5 13L9 17L19 7"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </Transition>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const props = defineProps({
    value: {
        type: [String, Number],
        required: true,
    },
    label: {
        type: [String],
        required: true,
    },
});

const input = ref();
const copied = ref<boolean>(false);

const copy = () => {
    input.value.focus();
    document.execCommand('copy');
    input.value.blur();
    copied.value = true;
    setTimeout(() => {
        copied.value = false;
    }, 1000);
};

const handleFocus = (event: any) => {
    event.target.select();
};
</script>

<style>
/*
  Enter and leave animations can use different
  durations and timing functions.
*/
.slide-fade-enter-active {
    transition: all 0.15s ease-out;
}
.slide-fade-leave-active {
    transition: none;
}

.slide-fade-enter-from {
    transform: translateY(-20px);
    opacity: 0;
}
</style>
