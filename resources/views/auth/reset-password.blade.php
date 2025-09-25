@extends('layouts.app')

@section('title')
	Maak nieuw wachtwoord aan
@endsection

@section('content')
	<form action="{{ route('password.email') }}" method="POST">
		@csrf	
		<label for="name">Emailadres</label>
		<br>
		
		<input type="text" id="email" name="email" value="{{ old('email') }}" required>			
		<br><br>

        <label for="name">Nieuw wachtwoord</label>
		<br>
		
		<input type="text" id="password" name="password" required>			
		<br><br>

        <label for="name">Nieuw wachtwoord herhaald</label>
		<br>
		
		<input type="text" id="password_confirmation" name="password_confirmation" required>			
		<br><br>

        <input type="hidden" id="token" name="token" value="{{ $token }}">

		@error('email')
			{{ $message }}
			<br>
		@enderror
		<br>

		<x-button type="submit">Wachtwoord aanmaken</x-button>
	</form>
@endsection