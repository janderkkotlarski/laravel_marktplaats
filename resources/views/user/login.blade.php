@extends('layouts.app')

@section('title')
	Inloggen
@endsection

@section('content')
	<form action="{{ route('authenticate') }}" method="POST">
		@csrf	
		<label for="name">Emailadres</label>
		<br>
		
		<input type="text" id="email" name="email" value="{{ old('email') }}" required>			
		<br><br>

		<label for="password">Wachtwoord</label>
		<br>
		<input type="password" id="password" name="password" required>
		<br>

		@error('email')
			{{ $message }}
			<br>
		@enderror
		<br>

		<x-button type="submit">Inloggen</x-button>
	</form>
@endsection