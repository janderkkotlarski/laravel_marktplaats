<x-button type="button" a_link="{{ route('adverts.list') }}">Advertentieoverzicht</x-button>

@guest
	<x-button type="button" a_link="{{ route('login') }}">Log In</x-button>
	
	<x-button type="button" a_link="{{ route('user.register') }}">Registratie</x-button>
@endguest

@auth
    <x-button type="button" a_link="{{ route('user.overview') }}">Jouw advertenties</x-button>
	<x-button type="button" a_link="{{ route('messages.list') }}">Jouw ontvangen berichten</x-button>
	<x-button type="button" a_link="{{ route('messages.roster') }}">Jouw verzonden berichten</x-button>

	<form action="/logout" method="POST">
		@csrf
		<x-button type="submit">Uitloggen</x-button>
	</form>
@endauth