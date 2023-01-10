<template>
    <slot name="button" :open="() => (isOpen = true)">
        <Button
            square
            secondary
            @click="isOpen = true"
            @keyup.esc="isOpen = false"
        >
            <IconPlus class="w-5 h-5" />
        </Button>
    </slot>
    <Modal
        :open="isOpen"
        @close="isOpen = false"
        v-bind="$attrs"
        md
        :title="$t('menus.add_item')"
    >
        <!-- Add group -->
        <FormGroup>
            <LinkForm v-model="link as any" />
        </FormGroup>
        <template v-slot:footer>
            <Button @click="submit"> {{ $t('menus.save') }} </Button>
        </template>
    </Modal>
</template>

<script lang="ts" setup>
import { PropType, ref } from 'vue';
import { Modal, Input, Select, Button, FormGroup } from '@/ui';
import IconPlus from '@/ui/Icons/IconPlus.vue';
import { useMenuItemForm, linksState } from '@/entities';
import LinkForm from '@/modules/link/LinkForm.vue';
import { Menu, MenuItem } from '@/types';

const isOpen = ref<boolean>(false);

const props = defineProps({
    menu: {
        type: Object as PropType<Menu>,
        required: true,
    },
    menuItem: {
        type: Object as PropType<MenuItem>,
        required: false,
        default: () => ({}),
    },
});

const link = ref({
    url: props.menuItem.link,
    text: props.menuItem.title,
    new_tab: false,
});

const submit = () => {
    const form = useMenuItemForm(props.menu, {
        id: props.menuItem?.id,
        link: link.value.url,
        title: link.value.text,
    });

    form.submit().then(() => {
        isOpen.value = false;
    });
};
</script>
