<template>
    <Link @click="handleLogout()" :hide-title="!expanded">
        <template v-slot:icon>
            <IconLogOut class="w-4 h-4" />
        </template>
        Logout
    </Link>
</template>

<script setup lang="ts">
import { useRouter } from 'vue-router';
import Link from './Link.vue';
import IconLogOut from '@/ui/Icons/IconLogOut.vue';
import { logout, isAuthenticated } from '@/entities';

defineProps({
    expanded: {
        type: Boolean,
        default: true,
    },
});

const router = useRouter();

const handleLogout = () => {
    logout().then(response => {
        isAuthenticated.value = false;
        router.push('/login');
    });
};
</script>
