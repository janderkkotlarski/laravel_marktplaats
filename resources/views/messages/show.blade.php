@extends('layouts.app')

@section('title')
	<b>Bericht van {{ $message->sender->name }}</b>    
@endsection

@section('content')
	<x-middle_row><b>Advertentie</b></x-middle_row>
    <x-middle_row>{{ $message->advert_title }}<br><br></x-middle_row>

    <x-middle_row><b>Inhoud</b></x-middle_row>
    <x-middle_row>{{ $message->entry }}<br><br></x-middle_row>

    <x-middle_row><b>Verstuurd op</b></x-middle_row>
    <x-middle_row>{{ $message->created_at }}<br><br></x-middle_row>

    @if($message->sender_id != Auth::user()->id)
        <x-middle_row>
            <form action="{{ route('messages.store') }}" method="POST">
                @csrf

                <label for="entry">Stuur bericht naar {{ $message->sender->name }}</label>
                <br>
                <input type="text" id="entry" name="entry" required>							

                <input type="hidden" id="user_id" name="user_id" value="{{ $message->sender_id }}">
                <input type="hidden" id="sender_id" name="sender_id" value="{{ Auth::user()->id }}">
                <input type="hidden" id="advert_title" name="advert_title" value="{{ $message->advert_title }}">
                <br>

                <x-button type="submit">Verstuur</x-button>
            </form>
        </x-middle_row>
    @endif
@endsection