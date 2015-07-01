@extends('layouts.master')


@section('content')

    <style>
        blockquote {
            background: #f9f9f9;
            border-bottom: 2px solid #ccc;
            margin: 1.5em 10px;
            padding: 0.5em 10px;
            quotes: "\201C" "\201D" "\2018" "\2019";
        }

        blockquote:before {
            color: #ccc;
            content: open-quote;
            font-size: 4em;
            line-height: 0.1em;
            vertical-align: -0.4em;
        }

        blockquote:after {
            color: #ccc;
            content: close-quote;
            font-size: 4em;
            line-height: 0.1em;
            margin-right: 0.25em;
            vertical-align: -0.5em;
        }

        blockquote p {
            display: inline;
        }
    </style>

    <h1>Student Testimonials / Reviews </h1>

    @foreach($reviews as $review)
    <p>
    <blockquote>
        <strong>{{$review->person_name}} - </strong>
        <em>{{$review->testimonial_text}}</em>

    </blockquote>
    @endforeach



@endsection