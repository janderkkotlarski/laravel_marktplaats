@extends('layouts.app')

@section('title')
	Jouw ontvangen berichten, {{ Auth::user()->name }}:
@endsection

@section('content')
	<tr>		
		<th>Gebruiker</th>
		<th>Aanmaaktijd</th>
		<th>Prijzenfestival!</th>
	</tr>

	@foreach($messages as $message)
		<tr>
			<td> {{ $message->user->name }} </td>
			<td> {{ $message->created_at }} </td>
			<td>Reageer hier!</td>
		</tr>
	@endforeach


@endsection