@extends('layouts.app')

@section('content')
    <div class="ui vertical stripe segment"
         style="background-image: linear-gradient(to right top, #fb4d3d, #fc6539, #fc7a37, #fb8e39, #f9a03f);">
        <div class="ui main container">
            <h1 class="ui center aligned inverted header">
                Registreren
            </h1>
            <p class="ui center aligned header">Bani Supermarkt</p>
        </div>
    </div>

    <div class="ui vertical stripe segment">
        <div class="ui container">
            <form class="ui form @if(count( $errors ) > 0) error @endif" method="POST"
                  action="{{ route('register') }}">
                @csrf
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
                    <label>Uw naam</label>
                    <div class="two fields">
                        <div class="field {{ $errors->has('voornaam') ? ' error' : '' }}">
                            <input type="text" name="voornaam" placeholder="Voornaam" value="{{ old('voornaam') }}" autofocus minlength="3" required>
                        </div>
                        <div class="field {{ $errors->has('achternaam') ? ' error' : '' }}">
                            <input type="text" name="achternaam" placeholder="Achternaam" value="{{ old('achternaam') }}" minlength="3" required>
                        </div>
                    </div>
                </div>
                <div class="field {{ $errors->has('email') ? ' error' : '' }}">
                    <label>E-mailadres</label>
                    <input type="email" name="email" placeholder="E-mailadres" value="{{ old('email') }}" required>
                </div>
                <div class="field">
                    <label>Wachtwoord</label>
                    <div class="two fields">
                        <div class="field {{ $errors->has('password') ? ' error' : '' }}">
                            <input type="password" name="password" placeholder="Wachtwoord" required>
                        </div>
                        <div class="field {{ $errors->has('password') ? ' error' : '' }}">
                            <input type="password" name="password_confirmation" placeholder="Wachtwoord Bevestigen"
                                   required>
                        </div>
                    </div>
                </div>
                <button class="ui secondary button" type="submit">Registreren</button>
            </form>
        </div>
    </div>
@endsection
