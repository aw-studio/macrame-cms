<template>
    <label class="flex items-center cursor-pointer max-w-max">
        <input
            @input="check()"
            type="checkbox"
            :checked="checked"
            :id="fieldId"
            class="w-0 h-0 mr-2 opacity-0"
            v-bind="$attrs"
        />
        <div
            :class="
                checked
                    ? 'bg-orange border-orange'
                    : 'bg-transparent border-indigo-900'
            "
            class="z-0 flex items-center justify-center flex-shrink-0 w-[18px] h-[18px] mr-2 border rounded-xs"
        >
            <svg
                :class="checked ? 'block' : 'hidden'"
                class="z-0 w-2.5 h-2.5 text-gray-500 pointer-events-none fill-gray-500"
                viewBox="0 0 17 12"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M16.576.414a1.386 1.386 0 010 1.996l-9.404 9.176A1.461 1.461 0 016.149 12c-.37 0-.74-.139-1.023-.414L.424 6.998a1.386 1.386 0 010-1.996 1.47 1.47 0 012.046 0l3.68 3.59L14.53.414a1.47 1.47 0 012.046 0z"
                    fill="#120F30"
                    fill-rule="nonzero"
                />
            </svg>
        </div>
        <div class="pl-1 cursor-pointer">
            <slot>
                {{ label ?? value }}
            </slot>
        </div>
    </label>
</template>

<script lang="ts" setup>
import { computed } from 'vue';
import { v4 as uuid } from 'uuid';

const props = defineProps({
    value: {
        type: String,
        required: true,
    },
    label: {
        type: String,
    },
    // TODO:
    // what is this used for @christian
    fieldId: {
        type: String,
        default: () => uuid(),
    },
    modelValue: {
        type: Array,
        required: true,
    },
});

const emit = defineEmits(['update:modelValue']);

const checked = computed(() => {
    if (Array.isArray(props.modelValue)) {
        return props.modelValue.includes(props.value);
    }

    return props.modelValue;
});

const check = () => {
    let updatedNames = [...props.modelValue];
    // remove name if checked, else add name
    if (checked.value) {
        updatedNames.splice(updatedNames.indexOf(props.value), 1);
    } else {
        updatedNames.push(props.value);
    }
    // emit the updated names
    emit('update:modelValue', updatedNames);
};
</script>

<style scoped>
input:focus + div {
    box-shadow: 0px 0 0 4px #d6d8e2;
}
</style>
