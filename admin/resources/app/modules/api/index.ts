import axios from 'axios';
import config from '@/config';

export * from './types';

const client = axios.create({
    baseURL: config.api.baseUrl,
    timeout: config.api.timeout,
    withCredentials: true,
    headers: { Accept: 'application/json' },
});

export { client };
