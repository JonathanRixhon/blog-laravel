@extends('layout')


@section("main_title")
    <title>{{$page_title}}</title>
@endsection


@section('main_content')
    {!! $post->body !!}
    <p>
        <a href="/">⬅ Go back</a>
    </p>
@endsection
