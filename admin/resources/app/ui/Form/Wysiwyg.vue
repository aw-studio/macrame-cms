<template>
    <div class="w-full">
        <div class="flex flex-wrap gap-3 mb-5" v-if="editor">
            <Listbox v-model="selectedHeading">
                <div class="relative min-w-[101px]">
                    <ListboxButton
                        class="px-3 py-2 text-sm w-full focus:outline-none focus:ring-4 focus:ring-orange-100 flex items-center gap-2 bg-gray-100 hover:bg-gray-200 rounded-[8px]"
                    >
                        <span class="inline-block">
                            {{ activeStyle }}
                        </span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="-5 -8 24 24"
                            width="16"
                            fill="currentColor"
                        >
                            <path
                                d="M7.071 5.314l4.95-4.95a1 1 0 1 1 1.414 1.414L7.778 7.435a1 1 0 0 1-1.414 0L.707 1.778A1 1 0 1 1 2.121.364l4.95 4.95z"
                            ></path>
                        </svg>
                    </ListboxButton>
                    <ListboxOptions
                        class="absolute z-20 mt-2 w-full focus:outline-none focus:ring-4 focus:ring-orange-100 rounded-[8px] overflow-auto bg-gray-100 max-h-40"
                    >
                        <ListboxOption
                            v-for="(heading, key) in headings"
                            :key="key"
                            :value="heading"
                        >
                            <li
                                class="px-3 py-2 text-sm cursor-pointer focus:bg-gray-200 hover:bg-gray-200"
                                :class="{
                                    'bg-gray-300': activeStyle == heading.name,
                                }"
                            >
                                {{ heading.name }}
                            </li>
                        </ListboxOption>
                    </ListboxOptions>
                </div>
            </Listbox>
            <button
                @click="editor?.chain().focus().toggleItalic().run()"
                class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px]"
                :class="{
                    'bg-orange-100 text-orange': editor.isActive('italic'),
                    'text-indigo-900 hover:bg-gray-100':
                        !editor.isActive('italic'),
                }"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="-7.5 -7 24 24"
                    width="24"
                    fill="currentColor"
                >
                    <path
                        d="M2.273 8l1.95-6H3a1 1 0 1 1 0-2h5a1 1 0 1 1 0 2H6.326l-1.95 6H6a1 1 0 1 1 0 2H1a1 1 0 1 1 0-2h1.273z"
                    ></path>
                </svg>
            </button>
            <button
                @click="editor?.chain().focus().toggleBold().run()"
                class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px]"
                :class="{
                    'bg-orange-100 text-orange': editor.isActive('bold'),
                    'text-indigo-900 hover:bg-gray-100':
                        !editor.isActive('bold'),
                }"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="-8.5 -7 24 24"
                    width="24"
                    fill="currentColor"
                >
                    <path
                        d="M2 5.455v2.727h1.5c.828 0 1.5-.61 1.5-1.364 0-.753-.672-1.363-1.5-1.363H2zm3.514-1.24C6.413 4.793 7 5.744 7 6.819 7 8.575 5.433 10 3.5 10H0V.91C0 .406.448 0 1 0h2c1.657 0 3 1.221 3 2.727 0 .55-.179 1.06-.486 1.489zM2 1.819v1.818h1c.552 0 1-.407 1-.909s-.448-.909-1-.909H2z"
                    ></path>
                </svg>
            </button>
            <button
                @click="editor?.chain().focus().toggleCode().run()"
                class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px]"
                :class="{
                    'bg-orange-100 text-orange': editor.isActive('code'),
                    'text-indigo-900 hover:bg-gray-100':
                        !editor.isActive('code'),
                }"
            >
                <svg
                    width="16"
                    stroke-width="1.5"
                    height="16"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M10 17L9.33334 17C8.22877 17 7.33334 16.1047 7.33334 15.0002C7.33334 14.3284 7.33334 13.6211 7.33333 13.1111C7.33333 12.5556 6 12 6 12C6 12 7.33333 11.4444 7.33334 10.8889C7.33334 10.4359 7.33334 9.70586 7.33334 8.99998C7.33334 7.89541 8.22877 7 9.33334 7L10 7"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M14 17L14.6667 17C15.7712 17 16.6667 16.1047 16.6667 15.0002C16.6667 14.3284 16.6667 13.6211 16.6667 13.1111C16.6667 12.5556 18 12 18 12C18 12 16.6667 11.4444 16.6667 10.8889C16.6667 10.4359 16.6667 9.70586 16.6667 8.99998C16.6667 7.89541 15.7712 7 14.6667 7L14 7"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M21 3.6V20.4C21 20.7314 20.7314 21 20.4 21H3.6C3.26863 21 3 20.7314 3 20.4V3.6C3 3.26863 3.26863 3 3.6 3H20.4C20.7314 3 21 3.26863 21 3.6Z"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </button>
            <button
                @click="selectLink()"
                class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px]"
                :class="{
                    'bg-orange-100 text-orange': editor.isActive('link'),
                    'text-indigo-900 hover:bg-gray-100':
                        !editor.isActive('link'),
                }"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="-3 -3 24 24"
                    width="16"
                    fill="currentColor"
                >
                    <path
                        d="M3.19 9.345a.97.97 0 0 1 1.37 0 .966.966 0 0 1 0 1.367l-2.055 2.052a1.932 1.932 0 0 0 0 2.735 1.94 1.94 0 0 0 2.74 0l4.794-4.787a.966.966 0 0 0 0-1.367.966.966 0 0 1 0-1.368.97.97 0 0 1 1.37 0 2.898 2.898 0 0 1 0 4.103l-4.795 4.787a3.879 3.879 0 0 1-5.48 0 3.864 3.864 0 0 1 0-5.47L3.19 9.344zm11.62-.69a.97.97 0 0 1-1.37 0 .966.966 0 0 1 0-1.367l2.055-2.052a1.932 1.932 0 0 0 0-2.735 1.94 1.94 0 0 0-2.74 0L7.962 7.288a.966.966 0 0 0 0 1.367.966.966 0 0 1 0 1.368.97.97 0 0 1-1.37 0 2.898 2.898 0 0 1 0-4.103l4.795-4.787a3.879 3.879 0 0 1 5.48 0 3.864 3.864 0 0 1 0 5.47L14.81 8.656z"
                    ></path>
                </svg>
            </button>
            <button
                @click="editor?.chain().focus().toggleBulletList().run()"
                class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px]"
                :class="{
                    'bg-orange-100 text-orange': editor.isActive('bulletList'),
                    'text-indigo-900 hover:bg-gray-100':
                        !editor.isActive('bulletList'),
                }"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="-5 -7 24 24"
                    width="24"
                    fill="currentColor"
                >
                    <path
                        d="M4 0h9a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 8h9a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0-4h9a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zM1 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0 8a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-4a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                    ></path>
                </svg>
            </button>
            <button
                @click="editor?.chain().focus().toggleOrderedList().run()"
                class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px]"
                :class="{
                    'bg-orange-100 text-orange': editor.isActive('orderedList'),
                    'text-indigo-900 hover:bg-gray-100':
                        !editor.isActive('orderedList'),
                }"
            >
                <svg
                    width="24"
                    stroke-width="1.5"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M9 6L20 6"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M5 8L5 4"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M6 14L4.6 14C4.26863 14 4 13.7314 4 13.4L4 12.6C4 12.2686 4.26863 12 4.6 12L5.4 12C5.73137 12 6 11.7314 6 11.4L6 10.6C6 10.2686 5.73137 10 5.4 10L4 10"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M4 16L5.4 16C5.73137 16 6 16.2686 6 16.6L6 19.4C6 19.7314 5.73137 20 5.4 20L4 20"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M6 18L4 18"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M9 12L20 12"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M9 18L20 18"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </button>
            <button
                @click="editor?.chain().focus().toggleUnderline().run()"
                class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px]"
                :class="{
                    'bg-orange-100 text-orange': editor.isActive('underline'),
                    'text-indigo-900 hover:bg-gray-100':
                        !editor.isActive('underline'),
                }"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="-7 -6.5 24 24"
                    width="24"
                    fill="currentColor"
                >
                    <path
                        d="M1.5 10h7a.5.5 0 1 1 0 1h-7a.5.5 0 1 1 0-1zM7 2a1 1 0 1 1 0-2h2a1 1 0 1 1 0 2v3a4 4 0 1 1-8 0V2a1 1 0 1 1 0-2h2a1 1 0 1 1 0 2v3a2 2 0 1 0 4 0V2z"
                    ></path>
                </svg>
            </button>
            <button
                @click="editor?.chain().focus().toggleBlockquote().run()"
                class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px]"
                :class="{
                    'bg-orange-100 text-orange': editor.isActive('blockquote'),
                    'text-indigo-900 hover:bg-gray-100':
                        !editor.isActive('blockquote'),
                }"
            >
                <IconQuote class="w-4 h-4" />
            </button>
            <button
                @click="editor?.chain().focus().undo().run()"
                class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px]"
            >
                <svg
                    width="16"
                    height="16"
                    stroke-width="1.5"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M5 7V9.5V12"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M7.875 9.5H14.875C20.375 9.5 20.375 18 14.875 18C11.875 18 4.875 18 4.875 18"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M11.375 13L7.875 9.5L11.375 6"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </button>
            <button
                @click="editor?.chain().focus().redo().run()"
                class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px]"
            >
                <svg
                    width="16"
                    height="16"
                    stroke-width="1.5"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M19 7V9.5V12"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M16 9.5C16 9.5 12 9.5 9 9.5C3.5 9.5 3.5 18 9 18C12 18 19 18 19 18"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M12.5 13L16 9.5L12.5 6"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </button>
            <button
                class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px]"
                @click="editor?.chain().focus().unsetAllMarks().run()"
            >
                <svg
                    width="16"
                    height="16"
                    stroke-width="1.5"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M7 4H4V7"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M8 12H12H16"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M4 11V13"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M11 4H13"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M11 20H13"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M20 11V13"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M17 4H20V7"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M7 20H4V17"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M17 20H20V17"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </button>
            <button
                class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px]"
                @click="toggleRawEdit()"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="-2 -4 24 24"
                    width="16"
                    fill="currentColor"
                >
                    <path
                        d="M12.7361611,0.063952038 C13.2551391,0.263360331 13.5227261,0.869148905 13.3338336,1.41701869 L8.54555162,15.3051026 C8.35665911,15.8529724 7.78281676,16.1354563 7.26383885,15.936048 C6.74486095,15.7366397 6.47727387,15.1308511 6.66616638,14.5829813 L11.4544484,0.694897379 C11.6433409,0.147027596 12.2171832,-0.135456255 12.7361611,0.063952038 Z M2.41421356,8.25614867 L5.94974747,11.9885083 C6.34027176,12.4007734 6.34027176,13.0691871 5.94974747,13.4814522 C5.55922318,13.8937173 4.9260582,13.8937173 4.53553391,13.4814522 L0.292893219,9.0026206 C-0.0976310729,8.59035554 -0.0976310729,7.9219418 0.292893219,7.50967674 L4.53553391,3.03084515 C4.9260582,2.61858008 5.55922318,2.61858008 5.94974747,3.03084515 C6.34027176,3.44311021 6.34027176,4.11152395 5.94974747,4.52378901 L2.41421356,8.25614867 Z M17.5857864,8.25614867 L14.0502525,4.52378901 C13.6597282,4.11152395 13.6597282,3.44311021 14.0502525,3.03084515 C14.4407768,2.61858008 15.0739418,2.61858008 15.4644661,3.03084515 L19.7071068,7.50967674 C20.0976311,7.9219418 20.0976311,8.59035554 19.7071068,9.0026206 L15.4644661,13.4814522 C15.0739418,13.8937173 14.4407768,13.8937173 14.0502525,13.4814522 C13.6597282,13.0691871 13.6597282,12.4007734 14.0502525,11.9885083 L17.5857864,8.25614867 Z"
                    ></path>
                </svg>
            </button>
            <button
                @click="openTableMenu = !openTableMenu"
                class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px]"
                :class="{
                    'bg-orange-100 text-orange': openTableMenu,
                    'text-indigo-900 hover:bg-gray-100': !openTableMenu,
                }"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="-5 -5 24 24"
                    width="16"
                    fill="currentColor"
                >
                    <path
                        d="M2,6 L6,6 L6,2 L2,2 L2,6 Z M2,8 L2,12 L6,12 L6,8 L2,8 Z M12,6 L12,2 L8,2 L8,6 L12,6 Z M12,8 L8,8 L8,12 L12,12 L12,8 Z M2,0 L12,0 C13.1045695,0 14,0.8954305 14,2 L14,12 C14,13.1045695 13.1045695,14 12,14 L2,14 C0.8954305,14 0,13.1045695 0,12 L0,2 C0,0.8954305 0.8954305,0 2,0 Z"
                    ></path>
                </svg>
            </button>

            <transition
                name="slide-open"
                enter-from-class="transition duration-300 -translate-y-3 opacity-0"
                enter-to-class="transition duration-300 translate-y-0 opacity-100"
                leave-from-class="transition duration-300 translate-y-0 opacity-100"
                leave-to-class="transition duration-300 -translate-y-3 opacity-0"
            >
                <div
                    v-if="openTableMenu"
                    class="min-w-max bg-gray-100 grid grid-cols-5 gap-2 rounded-[8px]"
                >
                    <button
                        @click="
                            editor
                                ?.chain()
                                .focus()
                                .insertTable({
                                    rows: 2,
                                    cols: 2,
                                    withHeaderRow: true,
                                })
                                .run()
                        "
                        aria-label="add table"
                        class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px] text-indigo-900 hover:bg-gray-200"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="-5 -5 24 24"
                            width="16"
                            fill="currentColor"
                        >
                            <path
                                d="M2,6 L6,6 L6,2 L2,2 L2,6 Z M2,8 L2,12 L6,12 L6,8 L2,8 Z M12,6 L12,2 L8,2 L8,6 L12,6 Z M12,8 L8,8 L8,12 L12,12 L12,8 Z M2,0 L12,0 C13.1045695,0 14,0.8954305 14,2 L14,12 C14,13.1045695 13.1045695,14 12,14 L2,14 C0.8954305,14 0,13.1045695 0,12 L0,2 C0,0.8954305 0.8954305,0 2,0 Z"
                            ></path>
                        </svg>
                    </button>
                    <button
                        @click="editor?.chain().focus().addColumnBefore().run()"
                        aria-label="add column before"
                        class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px] text-indigo-900 hover:bg-gray-200"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="-5 -5 24 24"
                            width="16"
                            fill="currentColor"
                        >
                            <path
                                d="M8,12 L8,2 L2,2 L2,3 C2,3.55228475 1.55228475,4 1,4 C0.44771525,4 0,3.55228475 0,3 L0,2 C0,0.8954305 0.8954305,0 2,0 L12,0 C13.1045695,0 14,0.8954305 14,2 L14,12 C14,13.1045695 13.1045695,14 12,14 L2,14 C0.8954305,14 0,13.1045695 0,12 L0,11 C0,10.4477153 0.44771525,10 1,10 C1.55228475,10 2,10.4477153 2,11 L2,12 L8,12 Z M10,12 L12,12 L12,10 L10,10 L10,12 Z M12,8 L12,6 L10,6 L10,8 L12,8 Z M12,4 L12,2 L10,2 L10,4 L12,4 Z M3,6 L3,5 C3,4.44771525 3.44771525,4 4,4 C4.55228475,4 5,4.44771525 5,5 L5,6 L6,6 C6.55228475,6 7,6.44771525 7,7 C7,7.55228475 6.55228475,8 6,8 L5,8 L5,9 C5,9.55228475 4.55228475,10 4,10 C3.44771525,10 3,9.55228475 3,9 L3,8 L2,8 C1.44771525,8 1,7.55228475 1,7 C1,6.44771525 1.44771525,6 2,6 L3,6 Z"
                            ></path>
                        </svg>
                    </button>
                    <button
                        @click="editor?.chain().focus().addColumnAfter().run()"
                        aria-label="add column after"
                        class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px] text-indigo-900 hover:bg-gray-200"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="-5 -5 24 24"
                            width="16"
                            fill="currentColor"
                        >
                            <path
                                d="M12,0 C13.1045695,0 14,0.8954305 14,2 L14,3 C14,3.55228475 13.5522847,4 13,4 C12.4477153,4 12,3.55228475 12,3 L12,2 L6,2 L6,12 L12,12 L12,11 C12,10.4477153 12.4477153,10 13,10 C13.5522847,10 14,10.4477153 14,11 L14,12 C14,13.1045695 13.1045695,14 12,14 L2,14 C0.8954305,14 0,13.1045695 0,12 L0,2 C0,0.8954305 0.8954305,0 2,0 L12,0 Z M4,10 L2,10 L2,12 L4,12 L4,10 Z M10,4 C10.5522847,4 11,4.44771525 11,5 L11,6 L12,6 C12.5522847,6 13,6.44771525 13,7 C13,7.55228475 12.5522847,8 12,8 L11,8 L11,9 C11,9.55228475 10.5522847,10 10,10 C9.44771525,10 9,9.55228475 9,9 L9,8 L8,8 C7.44771525,8 7,7.55228475 7,7 C7,6.44771525 7.44771525,6 8,6 L9,6 L9,5 C9,4.44771525 9.44771525,4 10,4 Z M4,6 L2,6 L2,8 L4,8 L4,6 Z M4,2 L2,2 L2,4 L4,4 L4,2 Z"
                            ></path>
                        </svg>
                    </button>
                    <button
                        @click="editor?.chain().focus().addRowBefore().run()"
                        aria-label="add row before"
                        class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px] text-indigo-900 hover:bg-gray-200"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="-5 -5 24 24"
                            width="16"
                            fill="currentColor"
                        >
                            <path
                                d="M12,8 L12,2 L11,2 C10.4477153,2 10,1.55228475 10,1 C10,0.44771525 10.4477153,0 11,0 L12,0 C13.1045695,0 14,0.8954305 14,2 L14,12 C14,13.1045695 13.1045695,14 12,14 L2,14 C0.8954305,14 0,13.1045695 0,12 L0,2 C0,0.8954305 0.8954305,0 2,0 L3,0 C3.55228475,0 4,0.44771525 4,1 C4,1.55228475 3.55228475,2 3,2 L2,2 L2,8 L12,8 Z M12,10 L10,10 L10,12 L12,12 L12,10 Z M8,12 L8,10 L6,10 L6,12 L8,12 Z M4,12 L4,10 L2,10 L2,12 L4,12 Z M6,3 L6,2 C6,1.44771525 6.44771525,1 7,1 C7.55228475,1 8,1.44771525 8,2 L8,3 L9,3 C9.55228475,3 10,3.44771525 10,4 C10,4.55228475 9.55228475,5 9,5 L8,5 L8,6 C8,6.55228475 7.55228475,7 7,7 C6.44771525,7 6,6.55228475 6,6 L6,5 L5,5 C4.44771525,5 4,4.55228475 4,4 C4,3.44771525 4.44771525,3 5,3 L6,3 Z"
                            ></path>
                        </svg>
                    </button>
                    <button
                        @click="editor?.chain().focus().addRowAfter().run()"
                        aria-label="add row after"
                        class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px] text-indigo-900 hover:bg-gray-200"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="-5 -5 24 24"
                            width="16"
                            fill="currentColor"
                        >
                            <path
                                d="M2,6 L2,12 L3,12 C3.55228475,12 4,12.4477153 4,13 C4,13.5522847 3.55228475,14 3,14 L2,14 C0.8954305,14 0,13.1045695 0,12 L0,2 C0,0.8954305 0.8954305,0 2,0 L12,0 C13.1045695,0 14,0.8954305 14,2 L14,12 C14,13.1045695 13.1045695,14 12,14 L11,14 C10.4477153,14 10,13.5522847 10,13 C10,12.4477153 10.4477153,12 11,12 L12,12 L12,6 L2,6 Z M2,4 L4,4 L4,2 L2,2 L2,4 Z M6,2 L6,4 L8,4 L8,2 L6,2 Z M10,2 L10,4 L12,4 L12,2 L10,2 Z M8,11 L8,12 C8,12.5522847 7.55228475,13 7,13 C6.44771525,13 6,12.5522847 6,12 L6,11 L5,11 C4.44771525,11 4,10.5522847 4,10 C4,9.44771525 4.44771525,9 5,9 L6,9 L6,8 C6,7.44771525 6.44771525,7 7,7 C7.55228475,7 8,7.44771525 8,8 L8,9 L9,9 C9.55228475,9 10,9.44771525 10,10 C10,10.5522847 9.55228475,11 9,11 L8,11 Z"
                            ></path>
                        </svg>
                    </button>
                    <button
                        @click="editor?.chain().focus().deleteTable().run()"
                        aria-label="delete table"
                        class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px]"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="-5 -5 24 24"
                            width="16"
                            fill="currentColor"
                        >
                            <path
                                d="M2,0 L12,0 C13.1045695,0 14,0.8954305 14,2 L14,12 C14,13.1045695 13.1045695,14 12,14 L2,14 C0.8954305,14 0,13.1045695 0,12 L0,2 C0,0.8954305 0.8954305,0 2,0 Z M2,4 L2,12 L12,12 L12,4 L2,4 Z M7,9.41421356 L5.58578644,10.8284271 C5.19526215,11.2189514 4.56209717,11.2189514 4.17157288,10.8284271 C3.78104858,10.4379028 3.78104858,9.80473785 4.17157288,9.41421356 L5.58578644,8 L4.17157288,6.58578644 C3.78104858,6.19526215 3.78104858,5.56209717 4.17157288,5.17157288 C4.56209717,4.78104858 5.19526215,4.78104858 5.58578644,5.17157288 L7,6.58578644 L8.41421356,5.17157288 C8.80473785,4.78104858 9.43790283,4.78104858 9.82842712,5.17157288 C10.2189514,5.56209717 10.2189514,6.19526215 9.82842712,6.58578644 L8.41421356,8 L9.82842712,9.41421356 C10.2189514,9.80473785 10.2189514,10.4379028 9.82842712,10.8284271 C9.43790283,11.2189514 8.80473785,11.2189514 8.41421356,10.8284271 L7,9.41421356 Z"
                            ></path>
                        </svg>
                    </button>
                    <button
                        @click="editor?.chain().focus().deleteColumn().run()"
                        aria-label="add column before"
                        class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px]"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="-5 -5 24 24"
                            width="16"
                            fill="currentColor"
                        >
                            <path
                                d="M12,0 C13.1045695,0 14,0.8954305 14,2 L14,3 C14,3.55228475 13.5522847,4 13,4 C12.4477153,4 12,3.55228475 12,3 L12,2 L6,2 L6,12 L12,12 L12,11 C12,10.4477153 12.4477153,10 13,10 C13.5522847,10 14,10.4477153 14,11 L14,12 C14,13.1045695 13.1045695,14 12,14 L2,14 C0.8954305,14 0,13.1045695 0,12 L0,2 C0,0.8954305 0.8954305,0 2,0 L12,0 Z M4,10 L2,10 L2,12 L4,12 L4,10 Z M10,4 C10.5522847,4 11,4.44771525 11,5 L11,6 L12,6 C12.5522847,6 13,6.44771525 13,7 C13,7.55228475 12.5522847,8 12,8 L11,8 L11,9 C11,9.55228475 10.5522847,10 10,10 C9.44771525,10 9,9.55228475 9,9 L9,8 L8,8 C7.44771525,8 7,7.55228475 7,7 C7,6.44771525 7.44771525,6 8,6 L9,6 L9,5 C9,4.44771525 9.44771525,4 10,4 Z M4,6 L2,6 L2,8 L4,8 L4,6 Z M4,2 L2,2 L2,4 L4,4 L4,2 Z"
                            ></path>
                        </svg>
                    </button>
                    <button
                        @click="editor?.chain().focus().deleteRow().run()"
                        aria-label="add column after"
                        class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px]"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="-5 -5 24 24"
                            width="16"
                            fill="currentColor"
                        >
                            <path
                                d="M2,6 L2,12 L3,12 C3.55228475,12 4,12.4477153 4,13 C4,13.5522847 3.55228475,14 3,14 L2,14 C0.8954305,14 0,13.1045695 0,12 L0,2 C0,0.8954305 0.8954305,0 2,0 L12,0 C13.1045695,0 14,0.8954305 14,2 L14,12 C14,13.1045695 13.1045695,14 12,14 L11,14 C10.4477153,14 10,13.5522847 10,13 C10,12.4477153 10.4477153,12 11,12 L12,12 L12,6 L2,6 Z M2,4 L4,4 L4,2 L2,2 L2,4 Z M6,2 L6,4 L8,4 L8,2 L6,2 Z M10,2 L10,4 L12,4 L12,2 L10,2 Z M8,11 L8,12 C8,12.5522847 7.55228475,13 7,13 C6.44771525,13 6,12.5522847 6,12 L6,11 L5,11 C4.44771525,11 4,10.5522847 4,10 C4,9.44771525 4.44771525,9 5,9 L6,9 L6,8 C6,7.44771525 6.44771525,7 7,7 C7.55228475,7 8,7.44771525 8,8 L8,9 L9,9 C9.55228475,9 10,9.44771525 10,10 C10,10.5522847 9.55228475,11 9,11 L8,11 Z"
                            ></path>
                        </svg>
                    </button>
                    <button
                        @click="editor?.chain().focus().mergeCells().run()"
                        aria-label="merge cells"
                        class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px]"
                    >
                        <svg
                            width="16"
                            height="16"
                            stroke-width="1.5"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M15 9H20.4C20.7314 9 21 9.26863 21 9.6V20.4C21 20.7314 20.7314 21 20.4 21H9.6C9.26863 21 9 20.7314 9 20.4V15"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M15 9V3.6C15 3.26863 14.7314 3 14.4 3H3.6C3.26863 3 3 3.26863 3 3.6V14.4C3 14.7314 3.26863 15 3.6 15H9"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </button>
                    <button
                        @click="editor?.chain().focus().splitCell().run()"
                        aria-label="split cells"
                        class="p-1 flex items-center focus:outline-none focus:ring-4 focus:ring-orange-100 justify-center w-8 h-8 rounded-[8px]"
                    >
                        <svg
                            width="16"
                            height="16"
                            stroke-width="1.5"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M21 9.6V20.4C21 20.7314 20.7314 21 20.4 21H9.6C9.26863 21 9 20.7314 9 20.4V9.6C9 9.26863 9.26863 9 9.6 9H20.4C20.7314 9 21 9.26863 21 9.6Z"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M15 3.6V14.4C15 14.7314 14.7314 15 14.4 15H3.6C3.26863 15 3 14.7314 3 14.4V3.6C3 3.26863 3.26863 3 3.6 3H14.4C14.7314 3 15 3.26863 15 3.6Z"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </button>
                </div>
            </transition>
        </div>
        <EditorContent
            :class="{ 'wysiwyg-has-errors': errors.length > 0 }"
            :editor="editor"
            v-if="!editRaw"
            ref="editorContent"
        />
        <Textarea
            v-model="contentCopy"
            v-if="editRaw"
            class="block bg-gray-50"
            :style="{
                'min-height': rawEditorHeight + 'px',
                'font-family': 'monospace',
            }"
        ></Textarea>
    </div>
    <Modal v-model:open="isOpen" sm title="Link wählen">
        <FormGroup>
            <div class="flex items-center space-x-2">
                <span> Externer link </span>
                <Toggle v-model="externalLink" />
            </div>
            <Select
                v-if="!externalLink"
                label="Link"
                v-model="selectedLink"
                :options="linksState.value"
                label-key="title"
                value-key="link"
            />
            <Input
                v-else
                v-model="selectedLink"
                class="w-full"
                label="Externer Link"
            />
            <CheckboxSwitch
                sm
                label="Neues Fenster öffnen"
                v-model="selectedLinkTargetBlank"
            />
        </FormGroup>
        <template v-slot:footer>
            <Button @click="setLink()"> select </Button>
        </template>
    </Modal>
</template>

<script lang="ts" setup>
import { watch, computed, ref, PropType } from 'vue';
import {
    Listbox,
    ListboxButton,
    ListboxOptions,
    ListboxOption,
} from '@headlessui/vue';
import { useEditor, EditorContent } from '@tiptap/vue-3';
import StarterKit from '@tiptap/starter-kit';
import Bold from '@tiptap/extension-bold';
import Italic from '@tiptap/extension-italic';
import Link from '@tiptap/extension-link';
import Underline from '@tiptap/extension-underline';
import Code from '@tiptap/extension-code';
import Table from '@tiptap/extension-table';
import OrderedList from '@tiptap/extension-ordered-list';
import TableRow from '@tiptap/extension-table-row';
import TableCell from '@tiptap/extension-table-cell';
import TableHeader from '@tiptap/extension-table-header';
import Blockquote from '@tiptap/extension-blockquote';
import { linksState } from '@/entities';
import Select from './Select.vue';
import Modal from '../Modal.vue';
import Button from '../Buttons/Button.vue';
import Input from './Input.vue';
import CheckboxSwitch from './CheckboxSwitch.vue';
import Toggle from './Toggle.vue';
import FormGroup from './FormGroup.vue';
import IconQuote from '../Icons/IconQuote.vue';
import Textarea from './Textarea.vue';

if (!linksState.isLoaded) {
    linksState.load();
}

const props = defineProps({
    modelValue: {
        type: String as PropType<any>,
        default: '',
    },
    errors: {
        type: Array,
        default: [],
    },
    hint: {
        type: String,
        default: null,
    },
});

const emit = defineEmits(['update:modelValue']);

const contentCopy = ref('');

const editor = useEditor({
    content: props.modelValue,
    extensions: [
        StarterKit,
        Bold,
        Italic,
        Underline,
        Code,
        Table.configure({
            resizable: true,
        }),
        TableRow,
        TableCell,
        TableHeader,
        OrderedList,
        Blockquote,
        Link.configure({
            openOnClick: false,
        }),
    ],
    onUpdate: () => {
        emit('update:modelValue', editor.value?.getHTML());
        contentCopy.value = editor?.value?.getHTML() as string;
    },
    onCreate({ editor }) {
        contentCopy.value = editor.getHTML();
    },
});

const editRaw = ref(false);
const editorContent = ref();
const rawEditorHeight = ref(150);
const toggleRawEdit = () => {
    if (!editRaw.value) {
        rawEditorHeight.value = editorContent.value.$el.offsetHeight;
    }

    editRaw.value = !editRaw.value;
};

watch(
    () => contentCopy.value,
    val => {
        if (editRaw.value) {
            let data = stripScripts(val);
            editor?.value?.commands.setContent(data);
        }
    }
);

const stripScripts = (s: any) => {
    var div = document.createElement('div');
    div.innerHTML = s;
    var scripts = div.getElementsByTagName('script');
    var i = scripts.length;
    while (i--) {
        scripts[i].parentNode?.removeChild(scripts[i]);
    }
    return div.innerHTML;
};

const openTableMenu = ref(false);

const headings = [
    { name: 'Paragraph', value: null },
    { name: 'Headline 1', value: 1 },
    { name: 'Headline 2', value: 2 },
    { name: 'Headline 3', value: 3 },
];

const selectedHeading = ref(headings[0]);

const activeStyle = computed(() => {
    if (editor.value?.isActive('paragraph')) {
        return 'Paragraph';
    }
    if (editor.value?.isActive('heading', { level: 1 })) {
        return 'Headline 1';
    }
    if (editor.value?.isActive('heading', { level: 2 })) {
        return 'Headline 2';
    }
    if (editor.value?.isActive('heading', { level: 3 })) {
        return 'Headline 3';
    }
});

const externalLink = ref(false);
const isOpen = ref(false);
const selectedLink = ref();
const selectedLinkTargetBlank = ref(false);

const selectLink = () => {
    selectedLink.value = editor.value?.getAttributes('link').href;
    if (editor.value?.getAttributes('link').target?.startsWith('_blank')) {
        selectedLinkTargetBlank.value = true;
    } else {
        selectedLinkTargetBlank.value = false;
    }
    if (selectedLink.value?.startsWith('http')) {
        externalLink.value = true;
    } else {
        externalLink.value = false;
    }
    isOpen.value = true;
};

watch(
    () => externalLink.value,
    val => {
        if (isOpen.value && !val) {
            selectedLink.value = '';
        }
    }
);

const setLink = () => {
    // const previousUrl = editor.value?.getAttributes('link').href;
    // const url = window.prompt('URL', previousUrl);
    const url = selectedLink.value;
    let target = '_self';

    if (selectedLinkTargetBlank.value) {
        target = '_blank';
    }

    isOpen.value = false;

    // cancelled
    if (url === null) {
        return;
    }

    // empty
    if (url === '') {
        editor.value?.chain().focus().extendMarkRange('link').unsetLink().run();

        return;
    }

    // update link
    editor.value
        ?.chain()
        .focus()
        .extendMarkRange('link')
        .setLink({ href: url, target: target })
        .run();
};

watch(selectedHeading, () => {
    if (selectedHeading.value.value == 1) {
        editor.value?.commands.setHeading({ level: 1 });
        return;
    }
    if (selectedHeading.value.value == 2) {
        editor.value?.commands.setHeading({ level: 2 });
        return;
    }
    if (selectedHeading.value.value == 3) {
        editor.value?.commands.setHeading({ level: 3 });
        return;
    }
    editor.value?.commands.setParagraph();
});
</script>

<style>
.ProseMirror {
    border: 1px solid #afaeb9;
    border-radius: 8px;
    background: white;
    padding: 20px;
    height: 350px;
    overflow-y: auto;
}
.wysiwyg-has-errors .ProseMirror {
    border: 1px solid #f74b6d;
    border-radius: 8px;
    background: white;
    padding: 20px;
    height: 350px;
    overflow-y: auto;
}
.ProseMirror:focus {
    outline: none;
    box-shadow: 0px 0 0 4px #ffeedf;
}
.ProseMirror h1 {
    font-size: 28px;
    line-height: 38px;
    font-weight: 600;
    margin-bottom: 32px;
}
.ProseMirror h2 {
    font-size: 22px;
    line-height: 30px;
    font-weight: 600;
    margin-bottom: 24px;
}
.ProseMirror h3 {
    font-size: 18px;
    line-height: 24px;
    font-weight: 600;
    margin-bottom: 18px;
}
.ProseMirror p {
    margin-bottom: 8px;
}
.ProseMirror a {
    text-decoration: underline;
    color: #0064fb;
}
.ProseMirror ul {
    padding-inline: 16px;
}
.ProseMirror ul > li {
    position: relative;
}
.ProseMirror ul > li::before {
    content: '';
    position: absolute;
    left: -16px;
    top: 10px;
    border-radius: 9999px;
    padding: 3px;
    background: #fead5e;
}
.ProseMirror ol {
    list-style: auto;
    padding-inline: 16px;
}
.ProseMirror table {
    border: 1px solid #120f30;
    border-collapse: collapse;
    margin-bottom: 20px;
}
.ProseMirror th {
    border: 1px solid #120f30;
    text-align: left;
    padding-inline: 12px;
    padding-top: 5px;
    min-width: 50px;
}
.ProseMirror td {
    border: 1px solid #120f30;
    padding-inline: 12px;
    padding-top: 5px;
    min-width: 50px;
}
.ProseMirror blockquote {
    text-align: center;
    font-size: 22px;
    color: #23b901;
    font-family: 'Roboto Slab';
    font-weight: bold;
}
.ProseMirror td,
.ProseMirror th {
    position: relative;
}
.ProseMirror .selectedCell:after {
    z-index: 2;
    position: absolute;
    content: '';
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background: rgba(254, 173, 94, 0.3);
    pointer-events: none;
}
</style>
