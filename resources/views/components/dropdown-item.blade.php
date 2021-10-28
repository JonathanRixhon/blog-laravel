@props(['active'=>'false'])

@php
    $classes="block text-left px-3 text-sm leading-8 hover:bg-blue-500 hover:text-white focus:bg-blue-500";
@endphp

<a {{$attributes([
        'class'=>$classes
    ])}}>

    {{$slot}}

</a>

{{--
class="block text-left px-3 text-sm leading-8 {{isset($currentCategory) && $currentCategory->is($category)?   : '' }} hover:bg-blue-500 hover:text-white focus:bg-blue-500"
--}}
