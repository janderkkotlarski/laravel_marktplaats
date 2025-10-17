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
			<td>
                <x-button type="button" a_link="{{ route('messages.page', $message) }}">Bekijk</x-button>
            </td>
		</tr>
	@endforeach

    @foreach($sender_data as $sender_bit)
        <x-middle_row>{{ $sender_bit[1] }}</x-middle_row>
    @endforeach

    


@endsection