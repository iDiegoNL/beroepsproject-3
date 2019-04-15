@extends('layouts.app')

@section('content')
    <div class="ui vertical stripe segment">
        <div class="ui main container">
            <h1 class="ui center aligned header">
                Producten zoeken per afdeling
            </h1>
            <div class="ui stackable grid category-cards">
                @if(is_null($categories))
                    <div class="three column row">
                        <div class="column">
                            <div class="ui card">
                                <div class="blurring dimmable image">
                                    <div class="ui dimmer">
                                        <div class="content">
                                            <div class="center">
                                                <a class="ui inverted button"
                                                   href="aaa">Bekijken</a>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="aaa">
                                </div>
                                <div class="content">
                                    <a class="header">Aaa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @foreach($categories->chunk(3) as $categories_chunked)
                    <div class="three column row">
                        @foreach($categories_chunked as $category)
                            <div class="column">
                                <div class="ui card">
                                    <div class="blurring dimmable image">
                                        <div class="ui dimmer">
                                            <div class="content">
                                                <div class="center">
                                                    <a class="ui inverted button"
                                                       href="{{ route('welcome') }}/producten/{{ strtolower(str_replace(' ', '-', (str_replace(',', '', $category->naam)))) }}/{{ $category->id }}">Bekijken</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ $category->image }}">
                                    </div>
                                    <div class="content">
                                        <a class="header">{{ $category->naam }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
