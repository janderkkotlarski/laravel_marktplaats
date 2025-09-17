<x-button type="button" a_link="{{ route('adverts.overview') }}">Advertentieoverzicht</x-button>

@guest
	<x-button type="button" a_link="{{ route('login') }}">Log In</x-button>
@endguest

@auth
    <x-button type="button" a_link="{{ route('user.overview') }}">Jouw advertenties, {{ Auth::user()->name }}</x-button>

	<form action="/logout" method="POST">
		@csrf
		<br>
		<x-button type="submit">Log out</x-button>
	</form>
@endauth