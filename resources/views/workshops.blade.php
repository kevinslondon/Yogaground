@extends('layouts.master')


@section('content')


    <h1>Upcoming Workshops </h1>

    @foreach($workshops as $workshop)
        <h2><a href="/workshop/{{$workshop->id}}" >{{$workshop->name}} </a> </h2>
            {!!$workshop->description  !!}

    @endforeach



@endsection