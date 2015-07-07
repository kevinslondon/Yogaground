@extends('layouts.master')


@section('content')

    <p>Thanks for filling in the form for {{$workshop->name }}.</p>
    <p>If you want to guarantee your place in the class, please use the form below to pay for the class in advance
        (£{{$workshop->fullfee }})</p>
    {{$workshop->paypal_fullfee }}

    @if($workshop->deposit > 0 ) 
    <p>&nbsp;</p>
    <p>You can also pay a deposit £{{$workshop->deposit }} which will guarantee your place. The balance of
        &pound;{{$workshop->fullfee - $workshop->deposit }} is payable on the first class</p>
    {{$workshop->paypal_deposit }}
    @endif
    <p>&nbsp;</p>
    <p>You can also pay the full fee of &pound;{{$workshop->fullfee }} in the class, although I will prioritise
        people who pay in advance. </p>
    <p>I look forward to seeing you in the class.</p>
    <p>Kevin </p>

@endsection