@extends('layouts.app')

@section('title')
	Email succesvol geverifieerd, {{ $user->name }}
@endsection

@section('content')
	Je kunt nu verder als geverifieerde gebruiker, {{ $user->name }}.
@endsection