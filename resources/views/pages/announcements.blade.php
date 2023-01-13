<x-default-layout>
    <div class="container">
        <h1 class="my-16">{{ $page->attributes->h1 }}</h1>
    </div>
    <div
        class="container grid grid-cols-1 gap-5 pb-16 md:grid-cols-2 lg:grid-cols-3"
        >
        @foreach ($data->announcements as $announcement)
            <h2>{{$announcement->attributes->title}}</h2>
        @endforeach
    </div>
</x-default-layout>
