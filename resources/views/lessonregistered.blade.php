@extends('layouts.master')


@section('content')

<p>Hi {{$student}}</p>
<p>It seems like you have already registered for {{$page_workshop->name}}. If you want to pay, please <a href="/pay/{{$page_workshop->id}}">click here</a>.</p>
<p>I look forward to seeing you in the class or in a future class.</p>
<p>Kevin  </p>


@endsection