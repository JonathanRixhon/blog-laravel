<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>

    <h2 class="inline-flex mt-2">By Lary Laracore <img src="/images/lary-head.svg" alt="Head of Lary the mascot"></h2>

    <p class="text-sm mt-14">
        Another year. Another update. We're refreshing the popular Laravel series with new content.
        I'm going to keep you guys up to speed with what's going on!
    </p>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category -->
        <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl">
            <x-dropdown>

                {{-- Trigger --}}
                <x-slot name="trigger">
                    <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 flex lg:inline-flex">
                        {{isset($currentCategory)?  $currentCategory->name : "Categories" }}
                        <x-svg.down-arrow class=" absolute pointer-events-none" style="right: 12px;" name="arrow"/>

                    </button>
                </x-slot>

                {{-- Items / Entries --}}
                <x-slot name="entries">
                    <x-dropdown-item
                        :href="URL::to('/')"
                        :active="request()->routeIs('home')"
                    >
                        All posts
                    </x-dropdown-item>
                    @foreach($categories as $category)
                        <x-dropdown-item
                            href="{{URL::to('/')}}/categories/{{$category->slug}}"
                            :active="isset($currentCategory) && $currentCategory->is($category)"
                            {{--:active="request()->is('/categories/'.$category->slug)"--}}
                        >
                            {{ucwords($category->name)}}
                        </x-dropdown-item>
                    @endforeach
                </x-slot>
            </x-dropdown>
            {{--
                <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
                    <option value="category" disabled selected>Category
                    </option>
                    @foreach($categories as $category)
                        <option value="{{$category->slug}}">{{$category->name}}</option>
                    @endforeach
                </select>
            --}}

            {{--<div x-data="{show:false}">
                <button @click="show=!show"
                        class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 flex lg:inline-flex">
                    Authors
                    <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                         height="22" viewBox="0 0 22 22">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z"></path>
                            <path fill="#222"
                                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                        </g>
                    </svg>
                </button>

                <div x-show="show" class="py-2 bg-gray-100 w-full mt-2 font-semibold rounded-xl absolute z-50"
                     style="display:none">
                    @foreach($authors as $author)
                        <a href="{{URL::to('/')}}/authors/{{$author->slug}}"
                           class="block text-left px-3 text-sm leading-8 hover:bg-blue-500 hover:text-white focus:bg-blue-500">
                            {{$author->name}}
                        </a>
                    @endforeach
                </div>
            </div>--}}


        </div>
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                <input type="text" name="search" placeholder="Find something"
                       class="bg-transparent placeholder-black font-semibold text-sm">
            </form>
        </div>
        <!-- Other Filters -->
    {{--        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">--}}
    {{--            <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">--}}
    {{--                <option value="Authors" disabled selected>Authors--}}
    {{--                </option>--}}
    {{--                @foreach($authors as $author)--}}
    {{--                    <option value="{{$author->name}}">--}}
    {{--                        {{$author->name}}--}}
    {{--                    </option>--}}
    {{--                @endforeach--}}
    {{--            </select>--}}

    {{--            <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"--}}
    {{--                 height="22" viewBox="0 0 22 22">--}}
    {{--                <g fill="none" fill-rule="evenodd">--}}
    {{--                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">--}}
    {{--                    </path>--}}
    {{--                    <path fill="#222"--}}
    {{--                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>--}}
    {{--                </g>--}}
    {{--            </svg>--}}
    {{--        </div>--}}

    <!-- Search -->


    </div>

    </div>
</header>
