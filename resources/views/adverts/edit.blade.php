@extends('layouts.app')

@section('title')
	Bewerk advertentie {{ $advert->title }}
@endsection

@section('content')
	<form action="{{ route('adverts.update', $advert) }}" method="POST">
        @method('PATCH')
		@csrf	
		<label for="title">Titel</label>
		<br>		
		<input type="text" id="title" name="title" value="{{ $advert->title }}"  required>			
		<br><br>

		<label for="description">Beschrijving</label>
		<br>
		<input type="text" id="description" name="description" value="{{ $advert->description }}" required>
		<br><br>

        <label for="price">Prijs</label>
		<br>
		€<input type="number" id="price" name="price" min="0" max="10000" step="0.01" value="{{ $advert->price }}" required>
		<br><br>

		<label for="category_id">Categoriën</label>
		<br>
		<select id="category_id" name="category_id[]" multiple>
			@foreach($categories as $category)
				<option value="{{ $category->id }}">{{ $category->name }}</option>
			@endforeach   
		</select>
		<br>

		<input type="hidden" id="premium" name="premium" value="{{ $advert->premium }}">

		@error('title')
			{{ $message }}
			<br>
		@enderror
		<br>

		<x-button type="submit">Opslaan</x-button>
	</form>
@endsection