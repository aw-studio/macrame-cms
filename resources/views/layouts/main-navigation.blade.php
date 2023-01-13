<nav {{ $attributes }}>
    <ul class="hidden lg:flex items-end h-[100px] flex-wrap gap-10">
        @foreach($navigation->items as $item)
        <li><a href="{{$item->link}}">{{$item->name}}</a></li>
        @endforeach
    </ul>
</nav>
