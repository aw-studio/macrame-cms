<nav {{ $attributes }}>
    <ul class="hidden lg:flex items-end h-[100px] flex-wrap gap-10">
        @foreach($navigation as $item)
        <li><a href="{{$item->link->url()}}">{{$item->title}}</a></li>
        @endforeach
    </ul>
</nav>
