@extends('layouts.master')


@section('content')

    <p>Thanks for filling in the form for {{$page_workshop->name }}.</p>
    @include('layouts.lessonpay')

@endsection