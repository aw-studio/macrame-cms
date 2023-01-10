import { useForm } from '@macramejs/macrame-vue3';
import { ForgotFormData, ForgotForm } from '@/types/forms';
import { forgot } from './api';

export type UseForgotPasswordForm = (
    data: Partial<ForgotFormData>
) => ForgotForm;

const useForgotPasswordForm: UseForgotPasswordForm = ({ email = '' }) =>
    useForm({
        data: { email },
        submit: data => forgot(data),
    });

export { useForgotPasswordForm };
