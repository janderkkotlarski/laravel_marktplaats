@props(['a_link', 'a_click'])

<!-- Needs to be this one long line in order to keep the link in the button -->

@isset($a_link)<a href="{{ $a_link }}">@endisset<button {{ $attributes }}>{{ $slot }}</button>@isset($a_link)</a>@endisset