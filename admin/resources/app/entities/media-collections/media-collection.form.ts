import {
    Media,
    MediaCollection,
    MediaCollectionForm,
    MediaCollectionFormData,
} from '@/types';
import { useForm } from '@macramejs/macrame-vue3';
import { ref, Ref } from 'vue';
import { updateOrCreateMediaCollection } from './api';

export type UseMediaCollectionForm = (
    data: Partial<MediaCollectionFormData> & { id?: number | undefined }
) => MediaCollectionForm;

const useMediaCollectionForm: UseMediaCollectionForm = ({
    title = '',
    key = '',
    id = undefined,
}) => {
    const form = useForm({
        data: { title, key },
        submit: data =>
            updateOrCreateMediaCollection(data, id).then(response => {
                // TODO: reload media collections
                return response;
            }),
    });

    return form;
};

const mediaCollectionForm =
    ref<MediaCollectionForm>() as Ref<MediaCollectionForm>;

export { useMediaCollectionForm, mediaCollectionForm };
