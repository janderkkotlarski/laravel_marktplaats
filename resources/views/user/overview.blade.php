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

	
@endsection