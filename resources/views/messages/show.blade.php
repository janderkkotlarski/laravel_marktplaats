@extends('layouts.app')

@section('title')
	<b>Bericht van {{ $sender->name }}</b>    
@endsection

@section('content')
	<x-middle_row><b>Inhoud</b></x-middle_row>
    <x-middle_row>{{ $message->entry }}<br><br></x-middle_row>

    <x-middle_row><b>Verstuurd op</b></x-middle_row>
    <x-middle_row>{{ $message->created_at }}<br><br></x-middle_row>    
@endsection