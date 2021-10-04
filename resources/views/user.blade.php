<x-layout>

    <x-slot name="title">
        <title>
            La liste des utilisateurs
        </title>
    </x-slot>

    <x-slot name="mainContent">
        <h2>
            {{ $user->name }}
        </h2>
        @forelse($user->posts as $post)
            <article>
                <h3>
                    <a href="/posts/{{$post->slug}}">{{$post->title}}</a>
                </h3>
                <p>
                    Created by: <b>{{$user->name}}</b>
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
                    {{$post->category->name}}
                </p>

            </article>
        @empty
            <p>{{$user->name}} n'a pas encore écrit de post</p>
        @endforelse
        <a href="/users">⬅ Go back</a>
    </x-slot>

</x-layout>

