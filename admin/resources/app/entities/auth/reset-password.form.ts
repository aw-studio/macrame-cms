import { useForm } from '@macramejs/macrame-vue3';
import { ResetFormData, ResetForm } from '@/types/forms';
import { resetPassword } from './api';

export type UseResetForm = (data: Partial<ResetFormData>) => ResetForm;

const useResetPasswordForm: UseResetForm = ({
    email = '',
    password = '',
    password_confirmation = '',
}) => {
    const form = useForm<ResetFormData>({
        data: { email, password, password_confirmation },
        submit: data => resetPassword(data),
    });

    return form;
};

export { useResetPasswordForm };
