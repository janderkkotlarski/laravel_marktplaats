@if ($errors->any())
    <tr>
        <td></td>
        <td>				
            @foreach ($errors->all() as $error)
                <li>Error: {{ $error }}</li>
            @endforeach
        </td>
    </tr>
@endif