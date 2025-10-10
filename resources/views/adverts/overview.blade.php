@extends('layouts.app')

@section('title')
	Advertentieoverzicht
@endsection

@section('content')
	<x-middle_row>		
		<form action="{{ route('adverts.list') }}" method="GET">
			@csrf
			<label for="entry">
				@if($request->category_id != 0)
					<b>
				@endif
				
				Categoriefilter

				@if($request->category_id != 0)					
					@foreach($categories as $category)
						@if($category->id == $request->category_id)
							-> {{ $category->name }}</b>
						@endif
					@endforeach
				@endif
			</label>
			<br>

			<select id="category_id" name="category_id">
				<option value="0"></option>
				@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
			<br>

			<x-button type="submit">
				Toepassen
			</x-button>
		</form>	
		<br>

	</x-middle_row>	

	<tr>
		<th>Titel</th>
		<th>Beschrijving</th>
		<th>Prijs</th>
		<th>Aanbieder</th>
		<th>Plaatsingsdatum</th>		
	</tr>	

	@foreach($adverts as $advert)
		<tr>
			<td>{{ $advert->title }}</td>
			<td>{{ $advert->description }}</td>
			<td>{{ $advert->price }}</td>			
			<td>{{ $advert->user->name }}</td>
			<td>{{ $advert->created_at }}</td>
			<td>
				<x-button type="button" a_link="{{ route('adverts.page', $advert) }}">Bekijk</x-button>
			</td>

		</tr>
	@endforeach

	<x-middle_row>
		<div>
		{{ $adverts->links() }}
</div>
	</x-middle_row>
@endsection