@extends('layouts.admin')


@section('content')

    <h1>Admin Home</h1>

    @foreach($workshops as $workshop)
    <p>{{$workshop->name}}</p>
        @foreach($workshop->students as $student)
            {{$student->name}}<br />
            @endforeach
    @endforeach

@endsection