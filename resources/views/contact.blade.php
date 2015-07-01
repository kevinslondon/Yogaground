@extends('layouts.master')


@section('content')

    <h1>Contact Me</h1>

    <div class="innerblock">
        <p><strong>My Details:</strong><br />
            Yogaground,Kevin Saunders<br />
            London N4 1DS
            <br />
            Tel: +44 (0) 7815 797 645
        </p>
    </div>
    <br clear="left" />

    @foreach ($errors->all() as $error)
        <p class="red">{{ $error }}</p>
    @endforeach
    <form method="post" >
        <div id="innercol" {!!$errors->first('name') ? 'class="red"' : ''!!}  >
            <strong> Your Name:</strong>      </div>
        <div class="innerblock">
            <input name="name" type="text" id="name" value="{{Input::old('name')}}" size="60" />
        </div>
        <br clear="left" />
        <div id="innercol" {!!$errors->first('email') ? 'class="red"' : ''!!} >
            <strong> Email Address:</strong>      </div>
        <div class="innerblock">
            <input name="email" type="text" id="email" value="{{Input::old('email')}}" size="60" />
        </div>
        <br clear="left" />
        <div id="innercol"  >
            <strong>Phone Number:</strong>      </div>
        <div class="innerblock">
            <input name="phone" type="text" id="phone" value="{{Input::old('phone')}}" size="60" />
        </div>
        <br clear="left" />
        <div id="innerblock"  >
            <strong>Comments</strong>      </div>
        <br clear="left" />
        <div id="innerblock" >
            <textarea name="comments" cols="45" rows="9" >{{Input::old('comments')}}</textarea>
        </div>
        <br clear="left" />
        <div id="innerblock" >
            <input type="submit" name="Submit" value="Submit" />
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>



@endsection