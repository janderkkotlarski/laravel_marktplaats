@extends('layouts.app')

@section('title')
	Jouw ontvangen berichten, {{ Auth::user()->name }}:
@endsection

@section('content')
	@if(count($messages) > 0)
		<tr>		
			<th>Gebruiker</th>
			<th>Aanmaaktijd</th>
			<th>Prijzenfestival!</th>
		</tr>

		@foreach($messages as $message)
			<tr>
				<td> {{ $message->sender->name }} </td>
				<td> {{ $message->created_at }} </td>
				<td>
					<x-button type="button" a_link="{{ route('messages.page', $message) }}">Bekijk</x-button>
				</td>
			</tr>
		@endforeach
	@endif

    @if(count($messages) == 0)
		<x-middle_row>Nog geen berichten</x-middle_row>
	@endif
    


@endsection