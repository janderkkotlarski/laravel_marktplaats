@extends('layouts.app')

@section('title')
	Email verificatie nodig, {{ $user->name }}
@endsection

@section('content')
	Je hebt een email ontvangen {{ $user->name }}, klik op de link erin voor verificatie.

	<br><br>

	<form action="{{ route('verification.send') }}" method="POST">
		@csrf	
	
		<input type="hidden" id="user" name="user" value="{{ $user }}">

		<x-button type="submit">Stuur nieuwe email</x-button>
	</form>

	@if (session('message'))
		<br>
		<div class="alert alert-success">
			{{ session('message') }}
		</div>	
	@endif
@endsection