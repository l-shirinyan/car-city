<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (Page::getStaticSEO())
        <x-shared.seo-tags :title="Page::get('seo_title') ?: ''" description="{{ Page::get('seo_description') }}"
            keywords="{{ Page::get('seo_keywords') }}" />
    @else
        @yield('seo')
    @endif
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <x-layout.header />
    @yield('content')
    @yield('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6Ld6dr8hAAAAAF9J5fcxNdvJE5fvibl-rhQOJxDX"></script>
</body>

</html>
