<x-layout>

    <x-slot name="title">
        <title>
            La liste des utilisateurs
        </title>
    </x-slot>

    <x-slot name="mainContent">
        <h2>
            Liste des auteurs
        </h2>
        <ul>

            @foreach ($users as $user)
                <li>
                    <a href="/users/{{$user->slug}}">
                        {{ $user->name }}
                    </a> - {{$user->posts->count()}}
                </li>
            @endforeach
        </ul>
    </x-slot>

</x-layout>

