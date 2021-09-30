<x-layout>

    <x-slot name="title">
        <title>
            La liste des posts
        </title>
    </x-slot>

    <x-slot name="mainContent">
        <h2>
            {{ $category->name }}
        </h2>
        @forelse($category->posts as $post)
            <article>
                <h3>
                    <a href="/posts/{{$post->slug}}">{{$post->title}}</a>
                </h3>

                <p>
                    Published on:
                    <time datetime="{{$post->published_at}}">
                        {{$post->published_at->diffForHumans()}}
                    </time>
                </p>

                <p>
                    {{$post->excerpt}}
                </p>

            </article>
        @empty
            <p>Il n'y a pas de posts dans la catégorie: {{ strtolower($category->name) }}</p>
        @endforelse
        <a href="/categories">⬅ Go back</a>
    </x-slot>

</x-layout>
