@extends('layouts.app')

@section('title')
	Plaats nieuwe advertentie
@endsection

@section('content')
	<form action="{{ route('advert.store') }}" method="POST">
		@csrf	
		<label for="name">Titel</label>
		<br>		
		<input type="text" id="title" name="title" required>			
		<br><br>

		<label for="password">Beschrijving</label>
		<br>
		<input type="text" id="description" name="description" required>
		<br><br>

        <label for="password">Prijs</label>
		<br>
		<input type="numver" id="price" name="price" min="0" max="10000" step="0.01" required>
		<br>

		@error('name')
			{{ $message }}
			<br>
		@enderror
		<br>

		<x-button type="submit">Advertentie aanmaken</x-button>
	</form>
@endsection