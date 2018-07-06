@extends('layouts.master')


@section('content')
    <h1>Workshop: {{$page_workshop->workshop_name}}</h1>
    {!!$page_workshop->fulltext!!}

    <p><a href="/workshoplist">Back to the list of workshops..</a></p>

@endsection
