@extends('layouts.master')


@section('content')


    <h1>Yoga/Alexander Technique Workshops </h1>

    @foreach($workshops as $workshop)
        <article style="border-bottom: 1px solid #053d24">
            <h2 class="workshop_link"><a href="/workshop/{{$workshop->id}}" >{{$workshop->name}} </a> </h2>
            @if($workshop->image)
                <img src="{{$workshop->image}}" alt="" align="left" style="margin-right:15px;" />
            @endif
            <p>{!!$workshop->description  !!}</p>
        </article>
    @endforeach



@endsection