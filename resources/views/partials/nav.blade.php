<x-button type="button" a_link="{{ route('adverts.list') }}">Advertentieoverzicht</x-button>

@guest
	<x-button type="button" a_link="{{ route('login') }}">Log In</x-button>
	
	<x-button type="button" a_link="{{ route('user.register') }}">Registratie</x-button>
@endguest

@auth
    <x-button type="button" a_link="{{ route('user.overview') }}">Jouw advertenties, {{ Auth::user()->name }}</x-button>

	<form action="/logout" method="POST">
		@csrf
		<br>
		<x-button type="submit">Uitloggen</x-button>
	</form>
@endauth