@props(['comment'])
<x-panel class="bg-gray-100">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/?id={{$comment->author->id}}" alt="" width="60" height="60"
                 class="rounded-xl">
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{$comment->author->name}}</h3>
                <p class="text-xs">Posted on
                    <time datetime=" {{$comment->created_at}}">
                        Le {{$comment->created_at->format(' d M. Y')}} at {{$comment->created_at->format(' H:m')}}
                    </time>
                </p>
            </header>
            <p>
                {{$comment->body}}
            </p>
        </div>
    </article>
</x-panel>
