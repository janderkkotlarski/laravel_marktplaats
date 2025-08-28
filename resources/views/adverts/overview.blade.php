@extends('layouts.app')

@section('title')
	Advertentieoverzicht
@endsection

@section('content')
	<tr>
		<th>Titel</th>
		<th>Gebruikersnaam</th>
		<th>Aanmaaktijd</th>
	</tr>

	@foreach($adverts as $advert)
		<tr>
			<td>{{ $advert->title }}</td>
			<td>{{ $advert->user->name }}</td>
			<td>{{ $advert->created_at }}</td>
		</tr>
	@endforeach	

	@guest
	<x-middle_row>
		<br><br>
		<x-button type="button" a_link="{{ route('user.register') }}">Gebruikersregistratie</x-button>		
	</x-middle_row>
	@endguest
@endsection