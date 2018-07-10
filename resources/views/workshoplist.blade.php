@extends('layouts.master')


@section('content')

    <h1>{{$pagecontent->header}}</h1>
    {!!$pagecontent->content!!}

    @foreach($workshops as $workshop)
        <article style="border-bottom: 1px solid #053d24">
            <h2 class="workshop_link"><a href="/workshopdetails/{{$workshop->id}}" >{{$workshop->workshop_name}} </a> </h2>
            @if($workshop->image)
                <img src="{{$workshop->image}}" alt="" align="left" style="margin-right:15px;" />
            @endif
            <p>{!!$workshop->description  !!}</p>
            <p><a href="/workshopdetails/{{$workshop->id}}" >Click here for further details ..</a></p>
        </article>
    @endforeach



@endsection