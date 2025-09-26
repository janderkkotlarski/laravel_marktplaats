@extends('layouts.app')

@section('title')
	Jouw advertenties, {{ Auth::user()->name }}
@endsection

@section('content')
	<tr>
		<th>Titel</th>
		<th>Gebruikersnaam</th>
		<th>Aanmaaktijd</th>
	</tr>

	<x-middle_row>
		<br><br>
		<x-button type="button" a_link="{{ route('advert.create') }}">Nieuwe advertentie</x-button>
	</x-middle_row>
@endsection