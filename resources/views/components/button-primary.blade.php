<div>
    @if ($attributes['href'])
        <a {{ $attributes }} class="font-semibold inline-flex items-center focus:outline-none focus:ring-4 focus:ring-primary-200 justify-center py-2.5 border-2 @if($attributes['disabled']) pointer-events-none @else @endif @if($attributes['outline']) text-primary border-primary bg-transparent @else text-white border-primary bg-primary @endif @if($attributes['square']) px-2.5 @else px-5 @endif">
            {{ $slot }}
        </a>
    @else
       <button {{ $attributes }} class="font-semibold inline-flex items-center focus:outline-none focus:ring-4 focus:ring-primary-200 justify-center py-2.5 border-2 @if($attributes['disabled']) pointer-events-none @else @endif @if($attributes['outline']) text-primary border-primary bg-transparent @else text-white border-primary bg-primary @endif @if($attributes['square']) px-2.5 @else px-5 @endif">
            {{ $slot }}
        </button>
    @endif
</div>
