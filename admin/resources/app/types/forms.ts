import {
    PartialResource,
    PostResource,
    DateTime,
    SystemUserResource,
    RedirectResource,
    EventResource,
} from './resources';
import { Form } from '@macramejs/macrame-vue3';

interface Image {
    id: number;
    title: string;
    alt: string;
}

// Example

export type Example = {
    foo: 'string';
};
export type ExampleForm = Form<Example>;

// Auth
export type LoginFormData = {
    email: string;
    password: string;
    remember: boolean;
};
export type LoginForm = Form<LoginFormData>;

export type ForgotFormData = {
    email: string;
};
export type ForgotForm = Form<ForgotFormData>;

export type ResetFormData = {
    email: string;
    password: string;
    password_confirmation: string;
};
export type ResetForm = Form<ResetFormData>;

// Page

export interface PageFormData {
    name: string;
    parent_id: number | null | undefined;
    content: { [k: string]: any }[];
    attributes: { [k: string]: any };
    is_live: boolean;
    publish_at: string | null;
    template: string;
    slug: string;
}
export type PageForm = Form<PageFormData>;

// Page Duplicate

export interface PageDuplicateFormData {
    name: string;
}
export type PageDuplicateForm = Form<PageDuplicateFormData>;

// Menu
export interface MenuFormData {
    title: string;
}
export type MenuForm = Form<MenuFormData>;

// MenuItem
export interface MenuItemFormData {
    title: string;
    link: string;
}
export type MenuItemForm = Form<MenuItemFormData>;

// Block

export type BlockFormData = {
    name: string;
    content: { [k: string]: any }[];
};
export type BlockForm = Form<BlockFormData>;

// Partials

export type PartialFormData = {
    name: string;
    attributes: { [k: string]: any };
};
export type PartialForm = Form<PartialFormData, PartialResource>;

// MediaCollection

export type MediaCollectionFormData = {
    title: string;
    key: string;
};
export type MediaCollectionForm = Form<MediaCollectionFormData>;

export type MediaCollectionUploadFormData = {
    files: any[];
};
export type MediaCollectionUploadForm = Form<
    MediaCollectionUploadFormData,
    PartialResource
>;

export type MediaCollectionRemoveFormData = {
    files: any[];
};
export type MediaCollectionRemoveForm = Form<
    MediaCollectionRemoveFormData,
    PartialResource
>;

export type MediaCollectionAddFormData = {
    ids: number[];
};
export type MediaCollectionAddForm = Form<
    MediaCollectionAddFormData,
    PartialResource
>;

// Redirect
export type RedirectFormData = {
    from_url: string;
    to_url: string;
    active: boolean;
    http_status_code: number;
};
export type RedirectForm = Form<RedirectFormData, RedirectResource>;

// System User
export type SystemUserFormData = {
    name: string;
    email: string;
    password: string;
    is_admin: boolean;
};
export type SystemUserForm = Form<SystemUserFormData, SystemUserResource>;

// Post
export type PostFormData = {
    slug: string;
    attributes: {
        title: string;
        sub_title: string;
        text: string;
        image: Image;
    };
    content: { [k: string]: any }[];
    publish_at: DateTime;
    unpublish_at: DateTime;
    feature_until: DateTime;
    is_pinned: boolean;
};
export type PostForm = Form<PostFormData, PostResource>;

// Event
export type EventFormData = {
    slug: string;
    attributes: {
        title: string;
        excerpt: string;
        text: string;
        location: string;
    };
    starts_at: DateTime;
    ends_at: DateTime;
};
export type EventForm = Form<EventFormData, EventResource>;

// Person

export type PersonFormData = {
    name: string;
    phone: string;
    email: string;
    description: string;
    image: Image;
};
export type PersonForm = Form<PersonFormData>;
