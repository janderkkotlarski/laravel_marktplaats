@extends('layouts.app')

@section('title')
	Advertentieoverzicht
@endsection

@section('content')
	<tr>
		<th>Titel</th>
		<th>Beschrijving</th>
		<th>Prijs</th>
		<th>Aanbieder</th>
		<th>Plaatsingsdatum</th>		
	</tr>	

	@foreach($adverts as $advert)
		<tr>
			<td>{{ $advert->title }}</td>
			<td>{{ $advert->description }}</td>
			<td>{{ $advert->price }}</td>			
			<td>{{ $advert->user->name }}</td>
			<td>{{ $advert->created_at }}</td>
			<td>
				<x-button type="button" a_link="{{ route('adverts.show', $advert) }}">Bekijk</x-button>
			</td>

		</tr>
	@endforeach	
@endsection