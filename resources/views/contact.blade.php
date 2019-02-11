@extends('layouts.master')


@section('content')

    <h1>Contact Me</h1>

    <div class="innerblock">
        <p><strong>My Details:</strong><br/>
            Yogaground,Kevin Saunders<br/>
            London N4 1DS
            <br/>
            Tel: +44 (0) 7815 797 645
        </p>
    </div>
    <br clear="left"/>
    <p class="red">
        @foreach ($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
    </p>
    <form method="post">
        <div id="innercol" {!!error_class(
        'name', $errors) !!} >
        <strong> Your Name:</strong>      </div>
        <div class="innerblock">
            <input name="name" type="text" id="name" value="{{old('name')}}" size="60"/>
        </div>
        <br clear="left"/>

        <div id="innercol" {!!error_class(
        'email', $errors) !!} >
        <strong> Email Address:</strong>      </div>
        <div class="innerblock">
            <input name="email" type="text" id="email" value="{{old('email')}}" size="60"/>
        </div>
        <br clear="left"/>

        <div id="innercol">
            <strong>Phone Number:</strong></div>
        <div class="innerblock">
            <input name="phone" type="text" id="phone" value="{{old('phone')}}" size="60"/>
        </div>
        <br clear="left"/>

        <div id="innerblock" {!!error_class(
        'comments', $errors) !!} >
            <strong>Comments:</strong></div>
        <br clear="left"/>

        <div id="innerblock">
            <textarea name="comments" cols="45" rows="9">{{old('comments')}}</textarea>
        </div>
        <br clear="left"/>

        <div id="innerblock" {!!error_class(
        'newsletter', $errors) !!} >
            <strong>Newsletter sign up?</strong>
            <input type="checkbox" name="newsletter" value="newsletter" {!!ticked('newsletter', 'newsletter')!!} />
            <br />

            I sometimes send out newsletters giving details of classes and workshops.
            Your email is kept completely confidential.

        </div>
        <br clear="left"/>

        <div id="innercol" {!!error_class(
        'captcha', $errors) !!}>
            <strong>Verify: </strong><br />
                {!! captcha_img('flat')!!}</div>
        <div class="innerblock">
            <input name="captcha" type="text" id="captcha" />
        </div>
        <br clear="left"/>

        <div id="innerblock">
            <input type="submit" name="Submit" value="Submit"/>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>



@endsection