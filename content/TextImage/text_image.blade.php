<div class="container flex justify-center my-16">
    <div class="grid max-w-4xl grid-cols-12 gap-10">
        <div class="col-span-6">
            <div class="prose">
                {!! $content['text'] !!}
            </div>
            <x-button-primary href="{{ $content['link']['url'] }}">
                @if ($content['link']['text'])
                    {{ $content['link']['text'] }}
                @else
                    Weiter
                @endif
            </x-button-primary>
        </div>
        <div class="col-span-6">
            <!-- TODO Image -->
            @isset($content['image']['url'])
                <x-image :image="$content['image']" />
            @endisset
        </div>
    </div>
</div>
