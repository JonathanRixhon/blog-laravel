<x-layout>

    <x-slot name="title">
        <title>
            La liste des catégories
        </title>
    </x-slot>

    <x-slot name="mainContent">
        <h1>
            Liste des catégories
        </h1>
        <ul>

            @foreach ($categories as $category)
                <li>
                    <a href="/categories/{{$category->slug}}">
                        {{ $category->name }}
                    </a> - {{$category->posts->count()}}
                </li>
            @endforeach
        </ul>
    </x-slot>

</x-layout>
