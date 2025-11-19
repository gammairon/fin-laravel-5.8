<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/storage/images/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/storage/images/favicon.png')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO -->
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLdFactory::generate() !!}

    <!-- Styles -->
    <link href="{{ mix('css/app.css', 'assets') }}" rel="stylesheet">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-MZG6WJW');</script>
    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MZG6WJW" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

</head>
<body class="front">
    <div id="app">
        @section('header')
            @include('front.partials.global.default_header')
        @show


        @yield('content')

        @section('footer')
            @include('front.partials.global.default_footer')
        @show

    </div>

    <!-- Scripts -->
    @stack('before_scripts')
    <script src="{{ mix('js/app.js', 'assets') }}" defer></script>
    @stack('after_scripts')
</body>
</html>
