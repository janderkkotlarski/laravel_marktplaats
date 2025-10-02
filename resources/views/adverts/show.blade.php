@extends('layouts.app')

@section('title')
	<b>Advertentie</b><br>
    {{ $advert->title }}

@endsection

@section('content')
	<x-middle_row><b>Beschrijving</b></x-middle_row>
    <x-middle_row>{{ $advert->description }}<br><br></x-middle_row>

    <x-middle_row><b>Prijs</b></x-middle_row>
    <x-middle_row>{{ $advert->price }}<br><br></x-middle_row>

    <x-middle_row><b>Geplaatst door</b></x-middle_row>
    <x-middle_row>{{ $advert->user->name }}<br><br></x-middle_row>

    <x-middle_row><b>Geplaatst op</b></x-middle_row>
    <x-middle_row>{{ $advert->created_at }}<br><br></x-middle_row>

    @auth
    <x-button type="button" a_link="{{ route('adverts.show', $advert) }}">Bekijk</x-button>
    @endauth
@endsection