@extends('errors::illustrated-layout')

@section('code', '429')
@section('title', __('Te veel requests'))

@section('image')
    <div style="background-image: url({{ asset('/svg/403.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', __('Sorry, u heeft te veel requests naar de server gemaakt.'))
