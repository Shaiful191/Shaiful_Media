@props(['tagsCsv'])

@php
$tags= explode(',' , $tagsCsv);
@endphp

<ul class="flex pb-2">
    @foreach($tags as $tag)
    <li class="flex ">
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><a href="/?tag={{$tag}}">{{$tag}}</a></span>
    </li>
    @endforeach
</ul>