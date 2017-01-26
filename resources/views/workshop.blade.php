@extends('layouts.master')


@section('content')
    <h1>{{$page_workshop->name}}</h1>
    {!!$page_workshop->fulltext!!}

@endsection
