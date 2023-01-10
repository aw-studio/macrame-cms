<template>
    <component
        :is="tag"
        class="inline-flex items-center justify-center px-3 py-2 text-xs font-medium rounded-full"
        :class="{
            'bg-gradient-to-r from-red-500 to-orange-500 text-white ':
                variant_ == 'primary',
            'bg-gray-800 text-gray': variant_ == 'gray',
            'bg-darkorange text-darkorange bg-opacity-30':
                variant_ == 'darkorange' || variant_ == 'orange',
            'bg-lightorange text-lightorange bg-opacity-30':
                variant_ == 'lightorange',
            'bg-grasgreen text-grasgreen bg-opacity-30':
                variant_ == 'grasgreen' || variant_ == 'green',
            'bg-turkise text-turkise bg-opacity-30': variant_ == 'turkise',
            'bg-lightblue text-lightblue bg-opacity-30':
                variant_ == 'lightblue',
            'bg-blue text-blue bg-opacity-30': variant_ == 'blue',
            'bg-red-signal text-red-signal bg-opacity-30': variant_ == 'red',
            'bg-purple text-purple bg-opacity-30': variant_ == 'purple',
            'bg-pink text-pink bg-opacity-30': variant_ == 'pink',
        }"
    >
        <slot />
    </component>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { getVariant, variants } from './_props/variant';

export default defineComponent({
    props: {
        ...variants,
    },
    setup(props, { attrs }) {
        const tag = 'href' in attrs ? 'a' : 'div';
        const variant_ = getVariant(props, {});

        return { tag, variant_ };
    },
});
</script>
