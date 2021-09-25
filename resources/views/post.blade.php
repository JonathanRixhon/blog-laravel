<x-layout>

    <x-slot name="title">
        <title>
            La liste des posts
        </title>
    </x-slot>

    <x-slot name="mainContent">
        {!! $post->body !!}
        <p>
            <a href="/">⬅ Go back</a>
        </p>
    </x-slot>

</x-layout>
