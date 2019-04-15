@extends('layouts.app')

@section('content')
    <!-- Modal -->
    <div class="ui modal">
        <i class="close icon"></i>
        <div class="header">
            Winkelwagen
        </div>
        <div class="image content">
            <div class="description">
                <div class="ui middle aligned huge divided list">
                    @foreach(Cart::getContent()->sortBy('name') as $item)
                        <div class="item">
                            <img class="ui avatar image" src="{{ $item->attributes->image }}">
                            <div class="content">
                                <a style="text-decoration: none; color: black;"
                                   href="{{ route('welcome') }}/product/{{ strtolower(str_replace(' ', '-', (str_replace(',', '', $item->name)))) }}/{{ $item->id }}">{{ $item->name }}</a>
                                <br>
                                <h5 class="sub header" style="color: grey;">{{ $item->attributes->weight }} g</h5>
                                <h5 class="sub header">&euro; {{ str_replace('.', ',', $item->price) }}</h5>
                            </div>
                            <div class="right floated content">
                                <span class="ui circular label">{{ $item->quantity }}</span>
                            </div>
                        </div>
                    @endforeach
                    <div class="item">
                        <div class="content">
                            <br>
                            Totaal: &euro; {{ str_replace('.', ',', Cart::getTotal()) }}
                        </div>
                    </div>
                    @if(Cart::getContent()->count() == 0)
                        <div class="ui placeholder segment">
                            <div class="ui icon header">
                                <i class="cart icon"></i>
                                Er zitten geen producten in uw winkelwagen
                            </div>
                            <a class="ui secondary button" href="{{ route('producten') }}">Producten Bekijken</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="actions">
            <div class="ui secondary button" onclick="$('.ui.modal').modal('hide');">Ga verder</div>
        </div>
    </div>
    <!-- /Modal -->

    <div class="ui vertical stripe segment"
         style=" background-image: linear-gradient(to bottom, #fb4d3d, #ff7a26, #ffa700, #ffd300, #ffff00);">
        <div class="ui main container">
            <h1 class="ui center aligned inverted header">
                Bestelling Bevestigen
            </h1>
            <p class="ui center aligned header">
                Bani Supermarkt
            </p>
        </div>
    </div>

    <div class="ui vertical stripe segment">
        <div class="ui one column stackable center aligned page grid">
            <div class="column">
                <div class="ui steps">
                    <a class="completed step" href="{{ route('afrekenen.adres') }}">
                        <i class="map marker alternate icon"></i>
                        <div class="content">
                            <div class="title">Adresgegevens</div>
                            <div class="description">Voer uw adresgegevens in</div>
                        </div>
                    </a>
                    <a class="completed step" href="{{ route('afrekenen.bezorgmoment') }}">
                        <i class="clock icon"></i>
                        <div class="content">
                            <div class="title">Bezorgmoment</div>
                            <div class="description">Bezorgmoment kiezen</div>
                        </div>
                    </a>
                    <div class="active step">
                        <i class="check double icon"></i>
                        <div class="content">
                            <div class="title">Bestelling Bevestigen</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui container">
            <br>
            <br>
            <div class="ui basic segments">
                <div class="ui segment">
                    <span>Bezorgmoment</span>
                    <p>{{ ucfirst($bezorgdag) }}
                        <small>vanaf 15:00</small>
                    </p>
                </div>
                <div class="ui segment">
                    <span>Naam</span>
                    <p>{{ Auth::user()->voornaam }} {{ Auth::user()->achternaam }}</p>
                </div>
                <div class="ui segment">
                    <span>Adres</span>
                    <p>
                        {{ \App\Address::where('user_id', Auth::id())->value('adres') . ', ' }}
                        {{ \App\Address::where('user_id', Auth::id())->value('postcode') . ' ' . \App\Address::where('user_id', Auth::id())->value('stad') }}
                        <br>
                        {{ \App\Address::where('user_id', Auth::id())->value('provincie') . ', ' }}
                        {{ \App\Address::where('user_id', Auth::id())->value('land') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="ui vertical stripe segment">
        <div class="ui container">
            <div class="ui middle aligned huge divided list">
                @foreach(Cart::getContent()->sortBy('name') as $item)
                    <div class="item">
                        <img class="ui avatar image" src="{{ $item->attributes->image }}">
                        <div class="content">
                            <a style="text-decoration: none; color: black;"
                               href="{{ route('welcome') }}/product/{{ strtolower(str_replace(' ', '-', (str_replace(',', '', $item->name)))) }}/{{ $item->id }}">{{ $item->name }}</a>
                            <br>
                            <h5 class="sub header" style="color: grey;">{{ $item->attributes->weight }} g</h5>
                            <h5 class="sub header">&euro; {{ str_replace('.', ',', $item->price) }}</h5>
                        </div>
                        <div class="right floated content">
                            <span class="ui circular label">{{ $item->quantity }}</span>
                        </div>
                    </div>
                @endforeach
                    <div class="item">
                        <div class="content">
                            <h4>
                                Subtotaal: &euro; {{ str_replace('.', ',', round(Cart::getSubTotalWithoutConditions(), 2)) }}
                                <br>
                                BTW: &euro; {{ str_replace('.', ',', round(Cart::getTotal() - Cart::getSubTotalWithoutConditions(), 2)) }}
                                <br>
                                <br>
                                Totaal: &euro; {{ str_replace('.', ',', round(Cart::getTotal(), 2)) }}
                            </h4>
                        </div>
                    </div>
                <div class="item">
                    <div class="right floated content">
                        <div class="ui left labeled button" tabindex="0">
                            <span class="ui basic right pointing label">
                                &euro; {{ str_replace('.', ',', round(Cart::getTotal(), 2)) }}
                            </span>
                            <a class="ui secondary button" href="{{ route('afrekenen.order', ['dag' => $bezorgdag]) }}">
                                Bevestigen <i class="angle right icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
