import { ref, Ref } from 'vue';
import { v4 as uuid } from 'uuid';

interface Notification {
    title: string;
    text: string;
    type?: 'info' | 'warning' | 'error' | 'success';
    dismissable?: boolean;
    duration?: number;
}
interface NotificationWithId {
    id: string;
    title: string;
    text: string;
    type?: 'info' | 'warning' | 'error' | 'success';
    dismissable?: boolean;
    duration?: number;
}

export const notify = (notification: Notification) => {
    let id = uuid();
    let data = {
        id: id,
        ...notification,
    };
    notifications.value.push(data);

    let current = notifications.value.find(
        el => el.id == id
    ) as NotificationWithId;

    if (!notification.dismissable) {
        setTimeout(() => {
            notifications.value.splice(notifications.value.indexOf(current), 1);
        }, notification.duration ?? 6000);
    }
};

export const notifications: Ref<NotificationWithId[]> = ref([]);
