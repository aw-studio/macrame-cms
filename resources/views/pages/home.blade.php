<x-default-layout>
    <x-slot name="meta">
        <x-meta :page="$page"/>
    </x-slot>
    {{-- @dd($page->attributes) --}}
   <div class="container">
        <h1 class="my-16">
            {{ $page->attributes->h1 }}
        </h1>
    </div>
    <x-content::text_full :content="$page->attributes->intro_text" />

    <div class="grid grid-cols-3 gap-4 container">
    @foreach($posts as $post)
        <div class="bg-white p-4 font-semibold">
            {{$post->attributes->title}}
            <img src="{{$post->attributes->image?->getUrl()}}"/>
        </div>
    @endforeach
    </div>
</x-default-layout>
