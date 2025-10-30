@extends('layouts.app')

@section('title')
	Promoveer advertentie {{ $advert->title }}
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
		<br>

		<x-button type="submit">Betaal 10 euro</x-button>
	</form>
@endsection