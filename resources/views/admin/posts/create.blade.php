<x-layout>
    <section class="px-6 py-8">
        <x-slot name="mainContent">
            <x-setting heading="Publish New Post">
                <form action="/admin/posts" enctype="multipart/form-data" method="POST" x-data="{
                        titleValue:$refs.title.value,
                        slugValue:'',
                        slugify(text){
                            return text.toString()
                            .toLowerCase()
                            .replace(/\s+/g, '-')
                            .replace(/[^\w\-]+/g, '')
                            .replace(/\-\-+/g, '-')
                            .replace(/^-+/, '')
                            .replace(/-+$/, '');
                        },
                        changeValue(){
                           this.slugValue = this.slugi fy(this.titleValue)
                        }
                    }">
                    @csrf


                    <div class="mb-6">
                        <label for="title" value="{{old('title')}}" class="block mb-2 uppercase font-bold text-xs
                            text-gray-700">
                            Title
                        </label>
                        <input
                            x-model="titleValue"
                            @input="changeValue()"
                            x-ref="title"
                            value="{{old('title')}}"
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
                            x-ref="slug"

                            x-bind:value="slugValue">
                        <x-error-message field="slug"/>
                    </div>


                    <div class="mb-6">
                        <label for="thumbnail" value="{{old('title')}}" class="block mb-2 uppercase font-bold
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

                    <div class="mb-6">
                        <label for="category" value="{{old('category')}}" class="block mb-2 uppercase font-bold text-xs
                            text-gray-700">
                            Category
                        </label>
                        <select class="border rounded border-gray-400 p-2 w-full" id="category" name="category_id">
                            @foreach(\App\Models\Category::all() as $category)
                                <option
                                    @if(old('category_id')==$category->id)

                                    @endif
                                    value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <x-error-message field="category"/>
                    </div>


                    <div class="mb-6">
                        <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Excerpt
                        </label>
                        <textarea class="border rounded border-gray-400 p-2 w-full"
                                  id="excerpt" name="excerpt">{{old('excerpt')}}</textarea>
                        <x-error-message field="excerpt"/>
                    </div>

                    <div class="mb-6">
                        <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Body
                        </label>
                        <textarea class="border rounded border-gray-400 p-2 w-full"
                                  id="body" name="body">{{old('body')}}</textarea>
                        <x-error-message field="body"/>
                    </div>

                    <x-submit-button>
                        Post article !
                    </x-submit-button>

                </form>
            </x-setting>

        </x-slot>
    </section>
</x-layout>
