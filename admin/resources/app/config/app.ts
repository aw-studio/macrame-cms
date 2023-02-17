import config from '../../../admin.config.json';
export default {
    url: import.meta.env.VITE_APP_URL,
    ...config,
};
