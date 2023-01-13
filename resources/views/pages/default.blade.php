<x-default-layout>
    {{-- <Image
        :src="$page->attributes->header->url"
        v-if="$page->attributes?->header?->url"
        class="w-full h-64"
    /> --}}

    <div class="container">
        <h1 class="my-16">
            {{ $page->attributes->h1}}
        </h1>
    </div>
    <x-content::resolver :content="$page->content" />
</x-default-layout>
