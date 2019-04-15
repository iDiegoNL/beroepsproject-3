<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bani') }}</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('semantic/dist/semantic.min.css') }}" rel="stylesheet">
    <script src="{{ asset('semantic/dist/semantic.min.js') }}"></script>
    <link href="{{ asset('css/bani.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/hint.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
</head>
<body class="Site">
<header>
    @include('includes.header')
</header>

<main class="Site-content">
    @yield('content')
</main>

<footer>
    @include('includes.footer')
</footer>

<script>
    $(document)
        .ready(function () {

            // fix menu when passed
            $('.masthead')
                .visibility({
                    once: false,
                    onBottomPassed: function () {
                        $('.fixed.menu').transition('fade in');
                    },
                    onBottomPassedReverse: function () {
                        $('.fixed.menu').transition('fade out');
                    }
                })
            ;

            // create sidebar and attach to menu open
            $('.ui.sidebar')
                .sidebar('attach events', '.toc.item')
            ;

            $('.category-cards .image').dimmer({
                on: 'hover'
            });

            $('.product-card .image').dimmer({
                on: 'hover'
            });

            $('.ui.accordion')
                .accordion()
            ;
        })
    ;
</script>
</body>
</html>
