import { Page, SystemUser } from '@/types';
import { useIndex } from '@macramejs/macrame-vue3';
import { loadSystemUsers } from './api';

type SystemUserIndexSortByKeys = string;

const useSystemUsersIndex = () => {
    return useIndex<SystemUser, SystemUserIndexSortByKeys>({
        load: params => loadSystemUsers(params),
    });
};

const systemUserIndex = useSystemUsersIndex();

export { useSystemUsersIndex, systemUserIndex };
