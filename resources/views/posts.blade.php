<x-layout>

    <x-slot name="title">
        <title>
            La liste des posts
        </title>
    </x-slot>

    <x-slot name="mainContent">
        <h1>Hello World</h1>
        @foreach ($posts as $post)
            <article>
                <h2>
                    <a href="/posts/{{$post->slug}}">{{$post->title}}</a>
                </h2>

                <p>
                    Created by: <b>{{$post->user->name}}</b>
                </p>

                <p>
                    Published on:
                    <time datetime="{{$post->published_at}}">
                        {{$post->published_at->diffForHumans()}}
                    </time>
                </p>

                <p>
                    {{$post->excerpt}}
                </p>

                <p>
                    <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
                </p>
            </article>
        @endforeach
    </x-slot>

</x-layout>

