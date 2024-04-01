@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);
@endphp

<ul class="flex flex-wrap   gap-1 ">
    @foreach ($tags as $tag )
    <li class="flex items-center justify-center bg-black text-white  py-1 px-3 mr-2 text-xs">
        <a >{{$tag}}</a>
    </li>
    @endforeach


</ul>

