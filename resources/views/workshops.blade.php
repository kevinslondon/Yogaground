@extends('layouts.master')


@section('content')


    <h1>Upcoming Yoga/Alexander Technique Workshops </h1>

    @foreach($workshops as $workshop)
        <article style="border-bottom: 1px solid #053d24">
        <h2 class="workshop_link"><a href="/workshop/{{$workshop->id}}" >{{$workshop->name}} </a> </h2>
        @if($workshop->image)
        <img src="{{$workshop->getImage()}}" alt="" align="left" style="margin-right:15px;" />
        @endif
            <p>{!!$workshop->getDescription()  !!}</p>
        </article>
    @endforeach

    <p>You can also see a list of workshops that I can currently offer.
        If you are interested in taking a workshop or hosting them, please contact me. The <a href="/workshoplist">list is here..</a></p>



@endsection