@if($title)
<title>{{ $title }}</title>
<meta name="title" content="{{ $title }}" />
@endif

@if($description)
<meta name="description" content="{{ $description }}" />
@endif

@if($ogImage)
<meta property="og:image" content="{{ $ogImage }}" />
@endif

@if($ogUrl)
<meta property="og:url" content="{{ $ogUrl }}" />
@endif

@if($ogType)
<meta property="og:type" content="{{ $ogType }}" />
@endif

@if($ogTitle)
<meta property="og:title" content="{{ $ogTitle }}" />
@endif

@if($ogDescription)
<meta property="og:description" content="{{ $ogDescription }}" />
@endif

