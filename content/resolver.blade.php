@foreach ($items as $item)
    <x-dynamic-component :component="'content::'.$item['type']" :content="$item['value']"/>
@endforeach
