@extends('layouts.admin')


@section('content')

    <h1>Forgot Password</h1>


    <p class="red">
        @foreach ($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
    </p>
    <form method="post">
        <div id="innercol" {!!error_class(
        'email', $errors) !!} >
            <strong> Your User Name:</strong>      </div>
        <div class="innerblock">
            <input name="email" type="text" id="email" value="{{old('email')}}" size="60"/>
        </div>
        <br clear="left"/>




        <div id="innerblock">
            <input type="submit" name="Submit" value="Submit"/>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>



@endsection