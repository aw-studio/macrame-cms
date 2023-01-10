<template>
    <GuestLayout>
        <form @submit.prevent="form.submit">
            <Input
                autofocus
                required
                type="email"
                autocomplete="username"
                v-model="form.email"
                :label="$t('auth.reset_password_username')"
                readonly
            />
            <Input
                required
                type="password"
                autocomplete="new-password"
                v-model="form.password"
                :label="$t('auth.reset_password_password')"
            />
            <Input
                required
                type="password"
                autocomplete="new-password"
                v-model="form.password_confirmation"
                :label="$t('auth.reset_password_confirmation')"
            />
            <div class="flex justify-center mt-5">
                <Button> {{ $t('auth.reset_password_button') }} </Button>
            </div>
        </form>
    </GuestLayout>
</template>

<script lang="ts" setup>
import { GuestLayout } from '@/layout';
import { useResetPasswordForm } from '@/entities';
import { ResetForm } from '@/types';
import { Input, Button } from '@/ui';

const form: ResetForm = useResetPasswordForm({});
</script>
