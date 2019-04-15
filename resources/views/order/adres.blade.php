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
                            Totaal: &euro; {{ str_replace('.', ',', round(Cart::getTotal(), 2)) }}
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
                Afrekenen
            </h1>
            <p class="ui center aligned header" onclick="$('.ui.modal').modal('show');">
                Totaal: &euro; {{ str_replace('.', ',', round(Cart::getTotal(), 2)) }}
            </p>
        </div>
    </div>

    <div class="ui vertical stripe segment">
        <div class="ui one column stackable center aligned page grid">
            <div class="column">
                <div class="ui steps">
                    <div class="active step">
                        <i class="map marker alternate icon"></i>
                        <div class="content">
                            <div class="title">Adresgegevens</div>
                            <div class="description">Voer uw adresgegevens in</div>
                        </div>
                    </div>
                    <div class="disabled step">
                        <i class="clock icon"></i>
                        <div class="content">
                            <div class="title">Bezorgmoment</div>
                            <div class="description">Bezorgmoment kiezen</div>
                        </div>
                    </div>
                    <div class="disabled step">
                        <i class="check double icon"></i>
                        <div class="content">
                            <div class="title">Bestelling Bevestigen</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui container">
            <form class="ui form @if(count( $errors ) > 0) error @endif" method="POST"
                  action="{{ route('afrekenen.adres.store') }}">
                <h4 class="ui dividing header">Adresgegevens</h4>
                @if(count( $errors ) > 0)
                    <div class="ui error message">
                        <div class="header">Er is iets fout gegaan</div>
                        <ul class="list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="field">
                    @csrf
                    <label>Uw naam</label>
                    <div class="two fields">
                        <div class="field {{ $errors->has('voornaam') ? ' error' : '' }}">
                            <input type="text" name="voornaam" placeholder="Voornaam"
                                   value="{{ Auth::user()->voornaam }}" required autofocus>
                        </div>
                        <div class="field {{ $errors->has('achternaam') ? ' error' : '' }}">
                            <input type="text" name="achternaam" placeholder="Achternaam"
                                   value="{{ Auth::user()->achternaam }}" required>
                        </div>
                    </div>
                </div>
                <div class="two fields">
                    <div class="field {{ $errors->has('adres') ? ' error' : '' }}">
                        <label>Adres</label>
                        <input type="text" name="adres" placeholder="Adres"
                               value="{{ \App\Address::where('user_id', Auth::id())->value('adres') }}" required>
                    </div>
                    <div class="field {{ $errors->has('adres') ? ' error' : '' }}">
                        <label>Postcode</label>
                        <input type="text" name="postcode" placeholder="Postcode"
                               value="{{ \App\Address::where('user_id', Auth::id())->value('postcode') }}" required>
                    </div>
                </div>
                <div class="two fields">
                    <div class="field {{ $errors->has('stad') ? ' error' : '' }}">
                        <label>Stad</label>
                        <input type="text" name="stad" placeholder="Stad"
                               value="{{ \App\Address::where('user_id', Auth::id())->value('stad') }}" required>
                    </div>
                </div>
                <div class="two fields">
                    <div class="field {{ $errors->has('provincie') ? ' error' : '' }}">
                        <label>Provincie</label>
                        <input type="text" name="provincie" placeholder="Provincie"
                               value="{{ \App\Address::where('user_id', Auth::id())->value('provincie') }}" required>
                    </div>
                    <div class="field">
                        <label>Land</label>
                        <select class="ui fluid dropdown" name="land" required>
                            <option value="NL" selected>Nederland</option>
                        </select>
                    </div>
                </div>
                <button class="ui secondary button" type="submit">Verder</button>
            </form>
        </div>
    </div>
@endsection
