<x-default-layout>
    <x-slot name="meta">
        <x-meta :page="$page"/>
    </x-slot>
    {{-- @dd($page->content) --}}
    @if($page->attributes->header_image)
        <img src="{{$page->attributes->header_image->getUrl() }}" alt="header image" class="w-full h-64" />
    @endif;

    <div class="container">
        <h1 class="my-16">
            {{ $page->attributes->h1}}
        </h1>
    </div>
    <x-content::resolver :content="$page->content" />
</x-default-layout>
