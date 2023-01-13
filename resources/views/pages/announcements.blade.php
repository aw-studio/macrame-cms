<x-default-layout>
    <div class="container">
        <h1 class="my-16">{{ $page->attributes->h1 }}</h1>
    </div>
    <div
        class="container grid grid-cols-1 gap-5 pb-16 md:grid-cols-2 lg:grid-cols-3"
        >
        @foreach ($data->announcements as $announcement)
            {{-- @dump($announcement) --}}
        @endforeach
    </div>
</x-default-layout>
