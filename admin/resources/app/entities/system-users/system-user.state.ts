import { SystemUser } from '@/types';
import { useState } from '@macramejs/macrame-vue3';
import { loadSystemUser } from './api';

export const systemUserState = useState<SystemUser, [number]>(undefined, {
    load: id => loadSystemUser(id),
});
