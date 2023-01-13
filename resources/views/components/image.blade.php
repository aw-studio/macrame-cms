<div class="relative @if (!$overflow) overflow-hidden @endif">
    <img {{ $attributes }} src="{{ $thumb }}" srcset="{{ $srcset }}" data-srcset="{{ $srcset }}"
        class="max-w-full max-h-full lazyload lazyload-animation @if ($cover) object-cover h-full w-full @else object-contain h-auto @endif">
</div>
