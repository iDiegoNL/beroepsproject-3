@extends('layouts.app')

@section('content')
    <div class="ui vertical stripe segment"
         style=" background-image: linear-gradient(to bottom, #fb4d3d, #ff7a26, #ffa700, #ffd300, #ffff00);">
        <div class="ui main container">
            <h1 class="ui center aligned inverted header">
                Bezorgmoment Kiezen
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
                    <div class="active step">
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
            <br>
            <br>
            <div class="ui three statistics">

                <a class="statistic" @if(date('H') < 11)href="{{ route('afrekenen.confirmation', ['dag' => 'vandaag']) }}"@endif()>
                    <div class="text value">
                        Vandaag
                    </div>
                    <div class="label">
                        @if(date('H') < 10)
                            Vanaf 15:00
                        @else
                            Niet Beschikbaar
                        @endif
                    </div>
                </a>
                <a class="statistic" href="{{ route('afrekenen.confirmation', ['dag' => 'morgen']) }}">
                    <div class="text value">
                        Morgen
                    </div>
                    <div class="label">
                        Vanaf 15:00
                    </div>
                </a>
                <a class="statistic" href="{{ route('afrekenen.confirmation', ['dag' => 'overmorgen']) }}">
                    <div class="text value">
                        Overmorgen
                    </div>
                    <div class="label">
                        Vanaf 15:00
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
