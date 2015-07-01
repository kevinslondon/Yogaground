@extends('layouts.master')


@section('content')
    <h1>{{$content->header}}</h1>
    {!!$content->content!!}

@endsection
