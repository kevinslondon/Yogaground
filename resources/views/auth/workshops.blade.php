@extends('layouts.admin')


@section('content')

    <h1>Workshop List</h1>

    @foreach($workshops as $workshop)
    <h2>{{$workshop->name}}</h2>
        @foreach($workshop->students as $student)
            {{$student->name}}<br />
            @endforeach
        <hr />
    @endforeach

@endsection