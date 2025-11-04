@extends('layouts.app')

@section('title')
	Promoveer advertentie<br>
	<b>{{ $advert->title }}</b><br>
	naar het eerste resultaat
@endsection

@section('content')
	<form action="{{ route('adverts.promotion', $advert) }}" method="POST">
        @method('PATCH')
		@csrf
        <input type="hidden" id="notify" name="notify" value="1">			

		@error('title')
			{{ $message }}
			<br>
		@enderror

		<x-button type="submit">Betaal 10 euro voor promotie</x-button>
	</form>
@endsection