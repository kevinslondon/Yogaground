@extends('layouts.master')


@section('content')
    <h1>{{$page_workshop->name}}</h1>
    {!!$page_workshop->headertext!!}
    {!!$page_workshop->getFullText()!!}
    {!!$page_workshop->footertext!!}

@endsection
