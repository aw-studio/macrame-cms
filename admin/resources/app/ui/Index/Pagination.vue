<template>
    <div class="flex justify-around">
        <div class="flex items-stretch space-x-2">
            <ButtonMidGray
                secondary
                square
                class="relative"
                @click="setPage(1)"
                :disabled="table.meta.current_page == 1"
            >
                <IconFastArrowLeft class="w-4 h-4" />
            </ButtonMidGray>
            <ButtonMidGray
                secondary
                square
                :disabled="table.meta.current_page == 1"
                @click="setPage(table.meta.current_page - 1)"
            >
                <IconNavArrowLeft class="w-4 h-4" />
            </ButtonMidGray>
            <div class="flex items-center px-4 space-x-6 text-gray-900 text-md">
                <span class="" v-if="table.meta.current_page > 2"> ... </span>
                <span
                    class="cursor-pointer"
                    v-if="
                        table.meta.current_page == table.meta.last_page &&
                        table.meta.current_page > 2
                    "
                    @click="setPage(table.meta.current_page - 2)"
                >
                    {{ table.meta.current_page - 2 }}
                </span>
                <span
                    class="cursor-pointer"
                    v-if="table.meta.current_page > 1"
                    @click="setPage(table.meta.current_page - 1)"
                >
                    {{ table.meta.current_page - 1 }}
                </span>
                <span class="font-bold text-orange">
                    {{ table.meta.current_page }}
                </span>
                <span
                    class="cursor-pointer"
                    v-if="table.meta.current_page < table.meta.last_page"
                    @click="setPage(table.meta.current_page + 1)"
                >
                    {{ table.meta.current_page + 1 }}
                </span>
                <span
                    class="cursor-pointer"
                    v-if="
                        table.meta.current_page == 1 && table.meta.last_page > 2
                    "
                    @click="setPage(table.meta.current_page + 2)"
                >
                    {{ table.meta.current_page + 2 }}
                </span>
                <span
                    class="cursor-pointer"
                    v-if="table.meta.current_page < table.meta.last_page - 1"
                >
                    ...
                </span>
            </div>
            <ButtonMidGray
                secondary
                square
                :disabled="!(table.meta.current_page < table.meta.last_page)"
                @click="setPage(table.meta.current_page + 1)"
            >
                <IconNavArrowRight class="w-4 h-4" />
            </ButtonMidGray>
            <ButtonMidGray
                secondary
                square
                class="relative"
                @click="setPage(table.meta.last_page)"
                :disabled="!(table.meta.current_page < table.meta.last_page)"
            >
                <IconFastArrowRight class="w-4 h-4" />
            </ButtonMidGray>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { PropType } from 'vue';
import { Index } from '@macramejs/macrame-vue3';
import ButtonMidGray from '../Buttons/ButtonMidGray.vue';
import IconNavArrowRight from '@/ui/Icons/IconNavArrowRight.vue';
import IconFastArrowRight from '@/ui/Icons/IconFastArrowRight.vue';
import IconNavArrowLeft from '@/ui/Icons/IconNavArrowLeft.vue';
import IconFastArrowLeft from '@/ui/Icons/IconFastArrowLeft.vue';
import { useRoute, useRouter } from 'vue-router';

const props = defineProps({
    table: {
        type: Object as PropType<Index>,
        required: true,
    },
});

const route = useRoute();
const router = useRouter();

const setPage = (i: number) => {
    props.table.setPage(i);
    router.push({
        path: route.path,
        query: { page: i },
    });
};
</script>
