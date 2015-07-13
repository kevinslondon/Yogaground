@extends('layouts.master')


@section('content')

<p>Sorry, there are no more spaces for {{$page_workshop->name}}.</p>

<p>If you have <strong>already registered</strong> and want to pay, please <a href="/lesson_pay/{{$page_workshop->id}}">click here</a>.</p>
<p>Please contact me if you want to be on the waiting list. People sometimes drop out so it's worth asking.</p>
<p>I look forward to seeing you in the class or in a future class.</p>
<p>Kevin  </p>

@endsection