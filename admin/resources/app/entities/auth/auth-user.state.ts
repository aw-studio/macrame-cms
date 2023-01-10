import { User } from '@/types';
import { useState } from '@macramejs/macrame-vue3';
import { computed } from 'vue';
import { loadUser } from './api';

export const authedUser = useState<User>(undefined, {
    load: () => loadUser(0),
});
