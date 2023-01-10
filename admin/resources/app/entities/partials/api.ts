import { PartialResource, PartialFormData } from '@/types';
import { LoadOne, Update, client } from '@/modules/api';

const loadPartial: LoadOne<PartialResource> = template =>
    client.get(`partials/${template}`);

const updatePartial: Update<PartialFormData> = (data, id) =>
    client.put(`partials/${id}`, data);

export { loadPartial, updatePartial };
