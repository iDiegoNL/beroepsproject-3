@extends('errors::illustrated-layout')

@section('code', '404')
@section('title', __('Pagina Niet Gevonden'))

@section('image')
    <div style="background-image: url({{ asset('/svg/404.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', __('Sorry, de pagina die u zocht is niet gevonden.'))