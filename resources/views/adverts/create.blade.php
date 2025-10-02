@extends('layouts.app')

@section('title')
	Plaats nieuwe advertentie
@endsection

@section('content')
	<form action="{{ route('adverts.store') }}" method="POST">
		@csrf	
		<label for="title">Titel</label>
		<br>		
		<input type="text" id="title" name="title" required>			
		<br><br>

		<label for="description">Beschrijving</label>
		<br>
		<input type="text" id="description" name="description" required>
		<br><br>

        <label for="price">Prijs</label>
		<br>
		<input type="number" id="price" name="price" min="0" max="10000" step="0.01" required>
		<br>

		<input type="hidden" id="premium" name="premium" value=0>

		<input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

		@error('title')
			{{ $message }}
			<br>
		@enderror
		<br>

		<x-button type="submit">Advertentie aanmaken</x-button>
	</form>
@endsection