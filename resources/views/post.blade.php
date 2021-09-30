<x-layout>

    <x-slot name="title">
        <title>
            La liste des posts
        </title>
    </x-slot>

    <x-slot name="mainContent">
        <h2>
            {{ $post->title }}
        </h2>
        <p>
            Published on:
            <time datetime="{{$post->published_at}}">
                {{$post->published_at->diffForHumans()}}
            </time>
        </p>
        <p>
            {{ $post->body }}
        </p>
        <a href="/">⬅ Go back</a>
    </x-slot>

</x-layout>
