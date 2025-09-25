@extends('layouts.app')

@section('title')
	Vraag nieuw wachtwoord aan
@endsection

@section('content')
	<form action="{{ route('password.email') }}" method="POST">
		@csrf	
		<label for="name">Emailadres</label>
		<br>
		
		<input type="text" id="email" name="email" value="{{ old('email') }}" required>			
		<br><br>

		@error('email')
			{{ $message }}
			<br>
		@enderror
		<br>

		<x-button type="submit">Aanvragen</x-button>
	</form>
@endsection