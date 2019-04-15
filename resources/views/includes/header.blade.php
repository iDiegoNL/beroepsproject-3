<div class="ui yellow borderless stackable main menu">
    <div class="ui text container">
        <div class="header item">
            <img class="logo" src="{{ asset('images/boni.jpg') }}" alt="Boni">
        </div>
        <a class="{{ request()->is('/') ? 'active' : '' }} item" href="{{ route('welcome') }}">Home</a>
        <a class="{{ request()->is('producten*') ? 'active' : '' }} item" href="{{ route('producten') }}">Producten</a>
        <a class="{{ request()->is('aanbiedingen*') ? 'active' : '' }} item">Aanbiedingen</a>
        <a class="{{ request()->is('recepten*') ? 'active' : '' }} item">Recepten</a>

        <div class="right menu">
            <div class="item">
                <div class="ui icon input">
                    <input type="text" placeholder="Producten zoeken...">
                    <i class="search link icon"></i>
                </div>
            </div>
            <div class="item">
                <div class="ui buttons">
                    <a class="ui positive button" href="{{ route('login') }}">Inloggen</a>
                    <div class="or" data-text="of"></div>
                    <a class="ui button" href="{{ route('register') }}">Registreren</a>
                </div>
            </div>
            <div class="item">
                <a class="ui secondary vertical animated button" tabindex="0" href="{{ route('cart') }}">
                    <div class="hidden content">{{ Cart::getContent()->count() }}</div>
                    <div class="visible content">
                        <i class="shop icon"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>