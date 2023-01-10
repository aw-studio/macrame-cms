import { client } from '@/modules/api';
import { notify } from '@/modules/toast';
import { ref } from 'vue';

// const resetSystem = () => client.post(`reset-system`);
const resetSystemBusyState = ref(false);

const resetSystem = async () => {
    resetSystemBusyState.value = true;
    try {
        await client.post(`reset-system`);
        notify({
            title: 'System zurückgesetzt',
            text: 'Das System wurde erfoglreich auf den Werkszustand zurückgesetzt.',
            type: 'success',
        });
    } catch (error) {
        let message = '';

        if (typeof error === 'string') {
            message = error;
        }
        if (error instanceof Error) {
            message = error.message;
        }

        notify({
            title: 'Fehler',
            text: message,
            type: 'error',
        });
    } finally {
        resetSystemBusyState.value = false;
    }
};

export { resetSystem, resetSystemBusyState };
