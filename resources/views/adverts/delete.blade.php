@extends('layouts.app')

@section('title')
	Verwijder {{ $advert->title }}
@endsection

@section('content')
	
	<x-middle_row>		
		<x-button type="button" a_link="{{ route('user.destroy') }}">Verwijderen</x-button>		
	</x-middle_row>

@endsection