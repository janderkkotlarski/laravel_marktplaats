@extends('layouts.app')

@section('title')
	Inloggen
@endsection

@section('content')
	<form action="{{ route('authenticate') }}" method="POST">
		@csrf	
		<label for="name">Gebruikersnaam</label>
		<br>
		
		<input type="text" id="name" name="name" value="{{ old('name') }}" required>			
		<br><br>

		<label for="password">Wachtwoord</label>
		<br>
		<input type="password" id="password" name="password" required>
		<br>

		@error('name')
			{{ $message }}
			<br>
		@enderror
		<br>

		<x-button type="submit">Inloggen</x-button>
	</form>
@endsection