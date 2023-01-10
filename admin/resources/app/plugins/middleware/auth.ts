import { loadUser, isAuthenticated, authedUser } from '@/entities';
import { NavigationGuardNext, Router } from 'vue-router';

interface MiddlewareParams {
    next: NavigationGuardNext;
    router: Router;
}

const auth = ({ next, router }: MiddlewareParams) => {
    if (isAuthenticated.value) {
        return next();
    }

    return authedUser
        .load()
        .then(response => {
            isAuthenticated.value = true;

            return next();
        })
        .catch(e => {
            isAuthenticated.value = false;
            router.push('/login');
        });
};

const guest = ({ next, router }: MiddlewareParams) => {
    if (!isAuthenticated.value) {
        return next();
    }

    return authedUser
        .load()
        .then(response => {
            // not a guest, go home!
            isAuthenticated.value = true;
            router.push('/');
        })
        .catch(e => {
            // is a guest, continue…
            isAuthenticated.value = false;
            return next();
        });
};

export { auth, guest };
