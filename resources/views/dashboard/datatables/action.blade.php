<div class="btn-group">
    <button type="button" class="btn btn-default">Bewerken</button>
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="{{ route('welcome') }}/product/{{ strtolower(str_replace(' ', '-', (str_replace(',', '', $naam)))) }}/{{ $ean }}" target="_blank">Bekijken</a></li>
        <li class="divider"></li>
        <li><a href="{{ route('dashboard.producten.destroy', [$ean]) }}">Verwijderen</a></li>
    </ul>
</div>