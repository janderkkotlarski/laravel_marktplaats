@if ($errors->any())
    <br>
    @foreach ($errors->all() as $error)
        <li>Foutmelding: {{ $error }}</li>
    @endforeach
@endif