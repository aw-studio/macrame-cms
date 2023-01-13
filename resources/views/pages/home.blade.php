<x-default-layout>
   <div class="container">
        <h1 class="my-16">
            {{ $page->attributes->h1 }}
        </h1>
    </div>
    <x-content::text_full :content="$page->attributes->intro_text" />
</x-default-layout>
