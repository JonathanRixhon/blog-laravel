<x-layout>
    <section class="px-6 py-8">
        <x-slot name="mainContent">
            <x-setting :heading="'Edit post: '.$post->title">
                <form action="/admin/posts/{{$post->id}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-6">
                        <label for="title" value="{{old('title')}}" class="block mb-2 uppercase font-bold text-xs
                            text-gray-700">
                            Title
                        </label>
                        <input
                            value="{{$post->title}}"
                            class="border rounded border-gray-400 p-2 w-full"
                            type="text"
                            id="title"
                            name="title"/>

                        <x-error-message field="title"/>

                    </div>

                    <div class="mb-6">
                        <label
                            for="slug"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Slug
                        </label>
                        <input
                            type="text"
                            class="border rounded border-gray-400 p-2 w-full"
                            id="slug"
                            name="slug"
                            value="{{$post->title}}"
                        >
                        <x-error-message field="slug"/>
                    </div>

                    <div class="flex mt-6">
                        <div class="mb-6 flex-1">
                            <label for="thumbnail" class="block mb-2 uppercase font-bold
                            text-xs
                            text-gray-700">
                                Thumbnail
                            </label>
                            <input
                                class="border rounded border-gray-400 p-2 w-full"
                                type="file"
                                id="thumbnail"
                                name="thumbnail"/>
                            <x-error-message field="title"/>
                        </div>
                        <img src="{{asset('storage/'.$post->thumbnail_path)}}" alt="Blog Post illustration"
                             class="rounded-xl" width="150"></div>

                    <div class="mb-6">
                        <label for="category" value="{{old('category')}}" class="block mb-2 uppercase font-bold text-xs
                            text-gray-700">
                            Category
                        </label>
                        <select class="border rounded border-gray-400 p-2 w-full" id="category" name="category_id">
                            <option value="{{$post->category->id}}">{{$post->category->name}}</option>
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <x-error-message field="category"/>
                    </div>


                    <div class="mb-6">
                        <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Excerpt
                        </label>
                        <textarea class="border rounded border-gray-400 p-2 w-full"
                                  id="excerpt" name="excerpt">{{$post->excerpt}}</textarea>
                        <x-error-message field="excerpt"/>
                    </div>

                    <div class="mb-6">
                        <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Body
                        </label>
                        <textarea class="border rounded border-gray-400 p-2 w-full"
                                  id="body" name="body">{{$post->body}}</textarea>
                        <x-error-message field="body"/>
                    </div>

                    <x-submit-button>
                        Update !
                    </x-submit-button>

                </form>
            </x-setting>
        </x-slot>
    </section>
</x-layout>
