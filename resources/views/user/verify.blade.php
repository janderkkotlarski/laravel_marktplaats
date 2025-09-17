@extends('layouts.app')

@section('title')
	Email verificatie nodig, {{ $user->name }}
@endsection

@section('content')
	Je hebt een email ontvangen {{ $user->name }}, klik op de link erin voor verificatie.	
@endsection