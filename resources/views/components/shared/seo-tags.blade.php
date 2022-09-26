<!-- Primary Meta Tags -->
<title>{{ $title }}</title>
<meta name="title" content="{{ $title }}">
<meta name="description" content="{{ $description }}">
<meta name="language" content="English">
<meta name="author" content="{{ env('APP_NAME') }}">
<meta name="keywords" content="{{ $keywords }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ env('APP_URL') }}/images/c-logo.svg">
<meta property="og:url" content="{{ env('APP_URL') }}">

<!-- Twitter -->
<meta property="twitter:url" content="{{ env('APP_URL') }}">
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:title" content="{{ $title }}">
<meta property="twitter:description" content="{{ $description }}">
<meta property="twitter:image" content="{{ env('APP_URL') }}/images/c-logo.svg">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
