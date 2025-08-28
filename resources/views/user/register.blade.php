@extends('layouts.app')

@section('title')
	Gebruikersregistratie
@endsection

@section('content')
	<tr>
		<th></th>
		<th>Vul de relevante data in:</th>
		<th></th>
        
	</tr>

    <x-middle_row>
        <br><br>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            
            <label for="name">Naam:</label>
            <br>
            <textarea id="name" name="name" required></textarea>
            <br><br>

            <label for="email">Email:</label>
            <br>
            <textarea id="email" name="email" required></textarea>
            <br><br>

            <label for="password">Wachtwoord:</label>
            <br>
            <textarea id="password" name="password" required></textarea>
            <br><br>
            
            <x-button type="submit">Registreren</x-button>
        </form>
    </x-middle_row>

    

@endsection