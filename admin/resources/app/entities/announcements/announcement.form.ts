import { useForm } from '@macramejs/macrame-vue3';
import { loadAnnouncement, updateOrCreateAnnouncement } from './api';
import { AnnouncementForm } from '@/types';

export type UseAnnouncementForm = () => AnnouncementForm;

// TODO: type
const useAnnouncementForm = () => {
    return useForm({
        data: {
            slug: '',
            content: [],
            attributes: {
                title: '',
                sub_title: '',
                text: '',
                image: {
                    id: 0,
                    title: '',
                    alt: '',
                },
            },
            publish_at: {
                readable_diff: '',
                original: '',
                iso: '',
                formatted: '',
                label: '',
            },
            unpublish_at: {
                readable_diff: '',
                original: '',
                iso: '',
                formatted: '',
                label: '',
            },
            feature_until: {
                readable_diff: '',
                original: '',
                iso: '',
                formatted: '',
                label: '',
            },
            is_pinned: false,
            importance: 3,
            propose_for_feature: false,
            district_association_id: 0,
            type: '',
        },
        submit: (data, id) => updateOrCreateAnnouncement(data, id),
        load: id => loadAnnouncement(id),
        transform: data => {
            return {
                ...data,
                district_association_id: data.district_association_id
                    ? data.district_association_id
                    : null,
                publish_at: data.publish_at.iso,
                unpublish_at: data.unpublish_at.iso,
                feature_until: data.feature_until.iso,
            };
        },
    });
};

const announcementForm = useAnnouncementForm();

export { useAnnouncementForm, announcementForm };
