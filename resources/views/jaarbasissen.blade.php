<!-- jaarbasissen.blade.php -->
@extends('master')
@section('title', 'Jaarbasissen')
@section('content')

<div id="popup">
</div>
<label for="naam_id">Naam</label>
<form id="form1" method="get" action="{{url('jaarbasissen')}}" accept-charset="UTF-8">
    <select class="form-select" id="naam_id" name="naam_id" required>
        <option value="geen">geen</option>      
        @for ($i = 0; $i < count($namen); $i++)
            <option value="{{ $namen[$i]['naam'] }}" {{ $gekozen == $namen[$i]['naam'] ? 'selected' : '' }}>
            {{ $namen[$i]['naam'] }}
            </option>
        @endfor
    </select>
    </br>
    <button type="submit" form="form1" value="Submit">Haal gegevens op</button>
</form>
@if($gekozen!="geen")
<table class="table table-sm" id="jaarbasis-table">
    <thead>
        <tr>
            <th>Naam</th>
            <th>Trap</th>
            <th>Loon</th>
        </tr>
    </thead>
    <tbody>
           @for ($i = 0; $i < count($jaarbasissen); $i++)
            <tr data-id={{$jaarbasissen[$i]['id']}}>
                    <td>
                        {{$jaarbasissen[$i]['naam']}}
                    </td>
                    <td>
                        {{$jaarbasissen[$i]['trap']}}
                    </td>
                    <td>
                        {{$jaarbasissen[$i]['loon']}}
                    </td>
                </tr>
            @endfor   
    </tbody>
</table>
<button type="button" class="btn btn-primary invisible" id="openJaarbasisDetail" data-bs-toggle="modal" data-bs-target="#jaarbasisDetail">
    Open    
</button>
@else
<p>Geen naam gekozen</p>
@endif

@endsection