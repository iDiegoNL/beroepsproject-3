@extends('layouts.app')

@section('content')
    <div class="ui vertical stripe segment"
         style="background-image: linear-gradient(to bottom, #fb4d3d, #ff7a26, #ffa700, #ffd300, #ffff00);">
        <div class="ui main container">
            <h1 class="ui center aligned header">
                <i class="fal fa-chevron-circle-left fa-xs" onclick="window.history.back();"></i>
                Terug naar {{ strtolower($categorie->naam) }}
            </h1>
            <div class="ui center aligned sub header">
                <div class="ui tiny breadcrumb">
                    <a class="section" href="{{ route('welcome') }}">Home</a>
                    <i class="right chevron icon divider"></i>
                    <a class="section" href="{{ route('producten') }}">Producten</a>
                    <i class="right chevron icon divider"></i>
                    <a class="section">{{ $categorie->naam }}</a>
                    <i class="right arrow icon divider"></i>
                    <div class="active section">{{ $product->naam }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui vertical stripe segment">
        <div class="ui two column stackable grid container">
            <div class="column">
                <img class="ui fluid centered medium image" src="{{ $product->foto }}" alt="{{ $product->naam }}">
            </div>
            <div class="column">
                <h2 class="ui header">
                    <div class="content">
                        {{ $product->naam }}
                        <a class="ui header" href="#">
                            <h4>
                                Alles van {{ $product->merk }}
                                <i class="fal fa-chevron-circle-right fa-xs"></i>
                            </h4>
                        </a>
                        <div class="sub header">
                            <br>
                            {{ $product->korteomschrijving }}
                        </div>
                    </div>
                </h2>
                <h2>&euro; {{ str_replace('.', ',', $product->prijs) }}</h2>
                <form method="POST" action="{{ route('cart.add') }}">
                    @csrf
                    <input type="hidden" name="ean" id="ean" value="{{ $product->ean }}">
                    <div class="ui action input">
                        <input type="number" name="aantal" id="aantal" min="1" max="10" value="1" required>
                        <button class="ui secondary right labeled icon button">
                            <i class="plus icon"></i>
                            Toevoegen
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="ui container">
            <h2 class="ui header">
                Omschrijving
                <div class="sub header">{{ $product->omschrijving }}</div>
            </h2>
            @if($product->aantal > 0)
                <h2 class="ui sub header">
                    Aantal
                </h2>
                <span>{{ $product->gewicht }} stuk(s)</span>
            @elseif($product->gewicht > 0)
                <h2 class="ui sub header">
                    Gewicht
                </h2>
                <span>{{ $product->gewicht }} gram</span>
            @endif
        </div>
        <div class="ui section divider"></div>
        <div class="ui two column stackable grid container">
            @if(!is_null($product->ingredienten))
                <div class="column">
                    <h2 class="ui medium header">
                        Ingrediënten
                    </h2>
                    <span>
                    {{ $product->ingredienten }}
                </span>
                </div>
            @endif

            @if(!is_null($product->allergieinfo))
                <div class="column">
                    <h2 class="ui medium header">
                        Allergie-informatie
                    </h2>
                    <span>
                    {{ $product->allergieinfo }}
                </span>
                </div>
            @endif

            @if(!is_null($product->gebruik))
                <div class="column">
                    <h2 class="ui medium header">
                        Gebruik
                    </h2>
                    <span>
                    {{ $product->gebruik }}
                </span>
                </div>
            @endif

            <div class="column">
                <h2 class="ui medium header">
                    Bewaren
                </h2>
                <span>
                    {{ $product->bewaren }}
                </span>
            </div>

            <div class="column">
                <h2 class="ui small header">
                    Kenmerken
                </h2>
                @if($product->kenmerken == 'Biologisch')
                    <span class="left floated ui circular mini label hint--top hint--rounded"
                          aria-label="Biologisch">
                            <img src="{{ asset('images/icons/bio.svg') }}" height="15" width="15"
                                 align="Biologisch">

                        </span>
                @elseif($product->kenmerken == 'Vegan')
                    <span class="left floated ui circular mini label hint--top hint--rounded"
                          aria-label="Veganistisch">
                            <img src="{{ asset('images/icons/vegan.svg') }}" height="15" width="15"
                                 align="Vegan">
                        </span>
                @elseif($product->kenmerken == 'Biologisch & Vegan')
                    <span class="left floated ui circular mini label hint--top hint--rounded"
                          aria-label="Biologisch">
                            <img src="{{ asset('images/icons/bio.svg') }}" height="15" width="15"
                                 align="Vegan">
                        </span>
                    <span class="left floated ui circular mini label hint--top hint--rounded"
                          aria-label="Veganistisch">
                            <img src="{{ asset('images/icons/vegan.svg') }}" height="15" width="15"
                                 align="Vegan">
                        </span>
                @endif
            </div>
            <div class="column">
                <h2 class="ui small header">
                    Land van oorsprong
                </h2>
                <span>{{ $product->oorsprong }}</span>
            </div>
        </div>
    </div>
@endsection
