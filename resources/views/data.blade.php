@extends('master')
@section('title', 'Data')


@section('content')

@for ($i = 0; $i < count($data); $i++)
        <label>
            {{$data[$i]['naam']}}
        </label>
        <p>
            {{$data[$i]['waarde']}}
        </p>
@endfor   

@endsection