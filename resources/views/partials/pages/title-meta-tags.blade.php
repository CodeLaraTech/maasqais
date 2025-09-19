@section('title', @$page->title ?? '')
@section('meta')
<meta name="description" content="{{ @$page->meta_description ?? '' }}">
    <meta name="keywords" content="{{ @$page->meta_keywords ?? '' }}">
    <link rel="canonical" href="{{ @$page->canonical_url ?? request()->url() }}">

    {{-- Open Graph tags --}}
    <meta property="og:title" content="{{ @$page->og_title ?? @$page->title }}">
    <meta property="og:description" content="{{ @$page->og_description ?? @$page->meta_description }}">
    <meta property="og:url" content="{{ @$page->og_url ?? request()->url() }}">
    <meta property="og:type" content="{{ @$page->og_type ?? 'website' }}">
    <meta property="og:site_name" content="{{ @$page->og_site_name ?? config('app.name', 'CRC') }}">
    <meta property="og:locale" content="{{ @$page->og_locale ?? 'en_US' }}">
    <meta property="article:published_time" content="{{ @$page->published_time??'' }}">
    <meta property="article:modified_time" content="{{ @$page->modified_time??'' }}">
    {{-- Twitter Card tags --}}
    <meta name="twitter:card" content="{{ @$page->twitter_card ?? 'summary' }}">
    <meta name="twitter:title" content="{{ @$page->twitter_title ?? @$page->og_title ?? @$page->title }}">
    <meta name="twitter:description" content="{{ @$page->twitter_description ?? @$page->og_description ?? @$page->meta_description }}">
@endsection
