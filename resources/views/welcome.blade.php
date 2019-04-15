<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('semantic/dist/semantic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bani.css') }}" rel="stylesheet">
    <script src="{{ asset('semantic/dist/semantic.min.js') }}"></script>
</head>
<body>
<!-- Following Menu -->
<div class="ui large top fixed hidden menu">
    <div class="ui container">
        <a class="active item">Home</a>
        <a class="item">Producten</a>
        <a class="item">Aanbiedingen</a>
        <a class="item">Recepten</a>
        <a class="item">Winkel</a>
        <div class="right menu">
            <div class="item">
                <a class="ui secondary button" href="{{ route('login') }}">Inloggen</a>
            </div>
            <div class="item">
                <a class="ui button" href="{{ route('register') }}">Registreren</a>
            </div>
        </div>
    </div>
</div>

<!-- Page Contents -->
<div class="pusher">
    <div class="ui inverted vertical masthead center aligned segment"
         style="background-image: url('http://localhost:8000/images/supermarket.jpg'); background-repeat: no-repeat; background-size: cover;">

        <div class="ui container">
            <div class="ui large secondary stackable inverted menu">
                <a class="active item">Home</a>
                <a class="item" href="{{ route('producten') }}">Producten</a>
                <a class="item">Aanbiedingen</a>
                <a class="item">Recepten</a>
                <a class="item">Winkel</a>

                <div class="right menu">
                    <div class="item">
                        <div class="ui icon input">
                            <input type="text" placeholder="Producten zoeken...">
                            <i class="search link icon"></i>
                        </div>
                    </div>
                </div>
                <div class="right item">
                    <a class="ui inverted button" href="{{ route('login') }}">Inloggen</a>
                    <a class="ui inverted button" href="{{ route('register') }}">Registreren</a>
                </div>
            </div>
        </div>

        <div class="ui text container">
            <h1 class="ui red header">Thuis bij Bani</h1>
            <h2 class="yellow">Bani Buurtsupermarkt</h2>
        </div>

    </div>

    <div class="ui vertical stripe segment">
        <div class="ui middle aligned container">
            <h1 class="ui center aligned header yellow">
                Wat kunnen we voor je doen?
            </h1>
            <div class="ui stackable grid">
                <div class="three column row">
                    <div class="column">
                        <h2 class="ui icon header">
                            <img src="{{ asset('images/magnifying-glass.svg') }}">
                            <div class="content">
                                Aanbiedingen bekijken
                                <div class="sub header">Elke week nieuwe scherp geprijsde aanbiedingen speciaal voor u
                                    in de aanbieding!
                                </div>
                            </div>
                        </h2>
                    </div>
                    <div class="column">
                        <h2 class="ui icon header">
                            <img src="{{ asset('images/grocery.svg') }}">
                            <div class="content">
                                Boodschappen bestellen
                                <div class="sub header">Bestel nu je boodschappen online en laat deze gratis
                                    thuisbezorgen vanaf &euro; 10!
                                </div>
                            </div>
                        </h2>
                    </div>
                    <div class="column">
                        <h2 class="ui icon header">
                            <img src="{{ asset('images/open.svg') }}">
                            <div class="content">
                                Supermarkt informatie
                                <div class="sub header">Bekijk onze contactinformatie, openingstijden en veel gestelde
                                    vragen.
                                </div>
                            </div>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="ui vertical stripe segment">
        <div class="ui middle aligned container">
            <h1 class="ui center aligned header">
                Bekijk onze lekkere recepten
            </h1>
            <div class="ui stackable grid">
                <div class="three column row">
                    <div class="column">
                        <div class="ui fluid card">
                            <a class="image" href="#">
                                <div class="ui blue right ribbon label">
                                    <i class="utensils icon"></i> Hoofdgerecht
                                </div>
                                <img src="{{ asset('images/placeholders/soup.jpg') }}">
                            </a>
                            <a class="content" href="#">
                                <div class="header">Goulashsoep</div>
                                <div class="description">
                                    Een aanschuifsoep, waarvan je nooit genoeg kunt maken, want weer opgewarmd is hij
                                    misschien nog wel lekkerder.
                                </div>
                            </a>
                            <div class="extra content">
                                <span>
                                    <i class="user icon"></i>
                                    4 Personen
                                </span>
                                <span>
                                    <i class="clock icon"></i>
                                    20 Minuten
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="ui fluid card">
                            <a class="image" href="#">
                                <div class="ui blue right ribbon label">
                                    <i class="utensils icon"></i> Hoofdgerecht
                                </div>
                                <div class="ui top left attached label">
                                    <img class="ui tiny image" src="{{ asset('images/icons/vegan.svg') }}" height="5"
                                         width="5" alt="">
                                </div>
                                <img src="{{ asset('images/placeholders/pasta.jpg') }}">
                            </a>
                            <a class="content" href="#">
                                <div class="header">Pasta</div>
                                <div class="description">
                                    Lekkere pasta met gekaramelliseerde rode ui en andijvie.
                                </div>
                            </a>
                            <div class="extra content">
                                <span>
                                    <i class="user icon"></i>
                                    4 Personen
                                </span>
                                <span>
                                    <i class="clock icon"></i>
                                    20 Minuten
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="ui fluid card">
                            <a class="image" href="#">
                                <div class="ui blue right ribbon label">
                                    <i class="birthday cake icon"></i> Gebak
                                </div>
                                <img src="{{ asset('images/placeholders/cake.jpg') }}">
                            </a>
                            <a class="content" href="#">
                                <div class="header">Aardbijencake</div>
                                <div class="description">
                                    Een aanschuifsoep, waarvan je nooit genoeg kunt maken, want weer opgewarmd is hij
                                    misschien nog wel lekkerder.
                                </div>
                            </a>
                            <div class="extra content">
                                <span>
                                    <i class="user icon"></i>
                                    4 Personen
                                </span>
                                <span>
                                    <i class="clock icon"></i>
                                    20 Minuten
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('includes.footer')
</div>

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

        })
    ;
</script>
</body>
</html>
