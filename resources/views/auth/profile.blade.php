@extends('layouts.app')

@section('content')
    <!-- Modal -->
    <div class="ui modal">
        <i class="close icon"></i>
        <div class="header">
            Wachtwoord aanpassen
        </div>
        <div class="content">
            <div class="ui icon message">
                <i class="close icon"></i>
                <i class="info icon"></i>
                <div class="content">
                    <div class="header">
                        Let op!
                    </div>
                    <p>Na het aanpassen van uw wachtwoord wordt u automatisch uitgelogd.</p>
                </div>
            </div>
            <form class="ui form @if(count( $errors ) > 0) error @endif" method="POST"
                  action="{{ route('klantenprofiel.update') }}" id="passwordForm">
                @csrf
                <input type="hidden" name="passwordChange" value="true">
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
                    <div class="field {{ $errors->has('oldPassword') ? ' error' : '' }}">
                        <label>Huidig Wachtwoord</label>
                        <input type="password" name="oldPassword" placeholder="********" required>
                    </div>
                    <label>Nieuw Wachtwoord</label>
                    <div class="two fields">
                        <div class="field {{ $errors->has('password') ? ' error' : '' }}">
                            <input type="password" name="password" placeholder="Nieuw Wachtwoord" required>
                        </div>
                        <div class="field {{ $errors->has('password') ? ' error' : '' }}">
                            <input type="password" name="password_confirmation" placeholder="Bevestig Wachtwoord"
                                   required>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="actions">
            <div class="ui secondary button" onclick="document.getElementById('passwordForm').submit(); ">
                Wachtwoord Aanpassen
            </div>
        </div>
    </div>
    <script>
        $('.message .close')
            .on('click', function() {
                $(this)
                    .closest('.message')
                    .transition('fade')
                ;
            })
        ;
    </script>
    <!-- /Modal -->

    <div class="ui vertical stripe segment"
         style="background-image: linear-gradient(to right top, #fb4d3d, #fc6539, #fc7a37, #fb8e39, #f9a03f);">
        <div class="ui main container">
            <h1 class="ui center aligned inverted header">
                Account
            </h1>
            <p class="ui center aligned header">Bani Supermarkt</p>
        </div>
    </div>

    <div class="ui vertical stripe segment">
        <div class="ui container">
            <form class="ui form @if(count( $errors ) > 0) error @endif" method="POST"
                  action="{{ route('klantenprofiel.update') }}">
                <h4 class="ui dividing header">Uw gegevens</h4>
                @csrf
                <input type="hidden" name="passwordChange" value="false">
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
                        <div class="field {{ $errors->has('email') ? ' error' : '' }}">
                            <input type="text" name="voornaam" placeholder="Voornaam"
                                   value="{{ Auth::user()->voornaam }}" minlength="3" required>
                        </div>
                        <div class="field {{ $errors->has('email') ? ' error' : '' }}">
                            <input type="text" name="achternaam" placeholder="Achternaam"
                                   value="{{ Auth::user()->achternaam }}" minlength="3" required>
                        </div>
                    </div>
                </div>
                <div class="field {{ $errors->has('email') ? ' error' : '' }}">
                    <label>E-mailadres</label>
                    <input type="email" name="email" placeholder="E-mailadres" value="{{ Auth::user()->email }}"
                           required>
                </div>
                <div class="field">
                    <div class="ui tertiary button" onclick="$('.ui.modal').modal('show');">Wachtwoord
                        aanpassen</div>
                </div>
                <button class="ui secondary button" type="submit">Registreren</button>
            </form>
        </div>
    </div>
@endsection
