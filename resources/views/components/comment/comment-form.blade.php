@props(['post'])
<x-panel class="bg-gray-100">
    <form action="/posts/{{$post->id}}/comments" method="POST" class="">
        @csrf

            <h3>Want to participate ?</h3>
        <header class="flex item-center">
            <img src="https://i.pravatar.cc/?id={{auth()->id()}}" alt="" width="40" height="40" class="rounded-full
            mr-4">
            <label for="body font-bold">Participate !</label>
        </header>
        <textarea class="block p-4 mb-6 mt-4  w-full" name="body" id="body"
                  cols="30" rows="10"></textarea>
        <button class="bg-blue-500 rounded-full pt-2 pb-2 pl-4 pr-4 uppercase text-white" type="submit">Envoyer</button>
    </form>
</x-panel>
