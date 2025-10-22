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
    <x-middle_row>{{ $advert->created_at }}<br><br><br></x-middle_row>

	@foreach($advert->bids as $bid)
		<x-middle_row><b>Bod door {{ $bid->user->name }}:</b> {{ $bid->price }}<br></x-middle_row>
	@endforeach

	<x-middle_row><br></x-middle_row>
	
    @auth
	@if($advert->user_id != Auth::user()->id)
		<x-middle_row>
			<form action="{{ route('bids.store') }}" method="POST">
				@csrf

				<label for="price">Bedrag om te bieden</label>
				<br>
				<input type="number" id="price" name="price" min="0" max="10000" step="0.01" required>							

				<input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">				
				<input type="hidden" id="advert_user_id" name="advert_user_id" value="{{ $advert->user_id }}">
				<input type="hidden" id="advert_id" name="advert_id" value="{{ $advert->id }}">
				<br>

				<x-button type="submit">Bevestig bod</x-button>
			</form>
			<br><br>
		</x-middle_row>
		
		<x-middle_row>
			<form action="{{ route('messages.store') }}" method="POST">
				@csrf

				<label for="entry">Stuur bericht naar {{ $advert->user->name }}</label>
				<br>
				<input type="text" id="entry" name="entry" required>							

				<input type="hidden" id="user_id" name="user_id" value="{{ $advert->user_id }}">
				<input type="hidden" id="sender_id" name="sender_id" value="{{ Auth::user()->id }}">
				<input type="hidden" id="advert_id" name="advert_id" value="{{ $advert->id }}">
				<input type="hidden" id="advert_title" name="advert_title" value="{{ $advert->title }}">
				<br>

				<x-button type="submit">Verstuur</x-button>
			</form>
		</x-middle_row>

		<x-middle_row>
			<x-errors/>
		</x-middle_row>
	@endif
    @endauth
@endsection