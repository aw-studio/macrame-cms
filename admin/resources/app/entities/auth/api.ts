import { client, Create, LoadOne, Update } from '@/modules/api';
import { ForgotFormData, LoginFormData, ResetFormData } from '@/types';
import { User, UserResource } from '@/types/resources';
import { AxiosResponse } from 'axios';
import { isAdmin } from './is-admin.state';

const login: Create<LoginFormData> = data =>
    client
        .get('sanctum/csrf-cookie', {
            baseURL: import.meta.env.VITE_APP_URL as string,
        })
        .then(() =>
            client.post('/admin/login', data, {
                baseURL: import.meta.env.VITE_APP_URL as string,
            })
        );

const logout: () => Promise<AxiosResponse> = () => client.post('/logout');

const forgot: Create<ForgotFormData> = data =>
    client.post('/forgot', data, {
        baseURL: import.meta.env.VITE_APP_URL as string,
    });

const resetPassword: Create<ResetFormData> = data =>
    client.post('/reset', data, {
        baseURL: import.meta.env.VITE_APP_URL as string,
    });

const loadUser: LoadOne<UserResource> = async () => {
    let re = await client.get('user');

    isAdmin.value = re.data.is_admin;
    return re;
};

export { login, logout, forgot, resetPassword, loadUser };
