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

	@foreach($advert->bids as $bid)
		<x-middle_row><b>Bod door {{ $bid->user->name }}</b></x-middle_row>
    	<x-middle_row>{{ $bid->price }}<br><br></x-middle_row>
	@endforeach

    @auth
		<x-middle_row>
			<form action="{{ route('bids.store') }}" method="POST">
				@csrf

				<label for="price">Bedrag</label>
				<br>
				<input type="number" id="price" name="price" min="0" max="10000" step="0.01" required>
				<br>				

				<input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

				<input type="hidden" id="advert_id" name="advert_id" value="{{ $advert->id }}">

				<input type="hidden" id="advert" name="advert" value="{{ $advert }}">

				<input type="hidden" id="advert_user_id" name="advert_user_id" value="{{ $advert->user_id }}">

				<x-errors/>
				<br>

				<x-button type="submit">Bevestig bod</x-button>
			</form>
		</x-middle_row>
    @endauth
@endsection