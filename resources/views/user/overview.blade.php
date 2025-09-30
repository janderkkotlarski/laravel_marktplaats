@extends('layouts.app')

@section('title')
	Jouw advertenties, {{ Auth::user()->name }}
@endsection

@section('content')
	<tr>
		<th>Titel</th>
		<th>Beschrijving</th>
		<th>Prijs</th>
	</tr>

	@foreach($adverts as $advert)
		<tr>
			<td>{{ $advert->title }}</td>
			<td>{{ $advert->description }}</td>
			<td>{{ $advert->price }}</td>
			<td>
				<x-button type="button" a_link="{{ route('adverts.edit', $advert) }}">
					Verander
				</x-button>
			</td>
		</tr>
	@endforeach

	<x-middle_row>
		<br><br>
		<x-button type="button" a_link="{{ route('advert.create') }}">Nieuwe advertentie</x-button>
	</x-middle_row>
@endsection