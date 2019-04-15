@extends('errors::illustrated-layout')

@section('code', '419')
@section('title', __('Pagina Verlopen'))

@section('image')
    <div style="background-image: url({{ asset('/svg/403.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', __('Sorry, uw sessie is verlopen. Laad de pagina opnieuw, en probeer het nogmaals.'))
