@isset($content['image']['url'])
    <div class="my-10">
        <x-image :image="$content['image']" />
    </div>
@endisset
