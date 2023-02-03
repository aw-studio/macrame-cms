@isset($content['image']['url'])
    <div class="container flex justify-center">
        <div class="max-w-4xl my-10 @if ($content['content_wide']) md:!max-w-full @endif">
            <x-image :image="$content['image']" />
        </div>
    </div>
@endisset
