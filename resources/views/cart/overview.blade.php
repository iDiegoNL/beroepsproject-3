@extends('layouts.app')

@section('content')
    <div class="ui vertical stripe segment"
         style="background-image: linear-gradient(to bottom, #fb4d3d, #ff7a26, #ffa700, #ffd300, #ffff00);">
        <div class="ui main container">
            <h1 class="ui center aligned inverted header">
                Winkelwagen
            </h1>
            <p class="ui center aligned inverted header">
                {{ Cart::getContent()->count() }} product(en) in uw winkelwagen
            </p>
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
                            <div class="ui small icon buttons">
                                <form method="POST" action="{{ route('cart.update') }}">
                                    @csrf
                                    <input type="hidden" name="value" value="minus">
                                    <input type="hidden" name="id" id="id" value="{{ $item->id }}">
                                    <button class="ui @if($item->quantity == 1) disabled @endif button"><i
                                                class="minus icon"></i></button>
                                </form>
                                <div class="or" data-text="{{ $item->quantity }}"></div>
                                <form method="POST" action="{{ route('cart.update') }}">
                                    @csrf
                                    <input type="hidden" name="value" value="plus">
                                    <input type="hidden" name="id" id="id" value="{{ $item->id }}">
                                    <button class="ui @if($item->quantity == 10) disabled @endif button"><i
                                                class="plus icon"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="right floated content">
                            <form method="POST" action="{{ route('cart.destroy') }}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" id="id" value="{{ $item->id }}">
                                <button class="circular ui tiny icon button hint--top" data-hint="Verwijderen"
                                        type="submit">
                                    <i class="trash icon"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
                @if(Cart::getContent()->count() > 0)
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
                                <a class="ui secondary button" href="{{ route('afrekenen.adres') }}">
                                    Bestellen <i class="angle right icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
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
@endsection
