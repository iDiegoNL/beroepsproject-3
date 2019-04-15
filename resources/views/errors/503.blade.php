@extends('errors::illustrated-layout')

@section('code', '503')
@section('title', __('Dienst Niet Beschikbaar'))

@section('image')
    <div style="background-image: url({{ asset('/svg/503.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', __($exception->getMessage() ?: 'Sorry, we zijn bezig met werkzaamheden. Probeer het straks opnieuw.'))
