@props(['blog'])

@php
$shrotBody = Str::limit($blog->description , 120, '...');
$shrotTitle = Str::limit($blog->title, 34);
$shrotTitleLength= strlen($shrotTitle);
@endphp


<x-card>
  <div class="max-w-md rounded overflow-hidden shadow-lg bg-white">
    <img class="w-full h-72" src="{{
        asset('images/card.jpg')}}"alt="Image">
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">
        <a href="/blogs/{{$blog->id}}">{{$blog->title}}</a>

      </div>
      <!-- @if($shrotTitleLength < 37)
        <div class="text-white">
          fdf
        </div>
      @endif  -->
      <p class="text-gray-700 text-base">
      {!! $shrotBody !!} 
      </p>
    
      <button class="bg-black text-white font-bold py-2 px-4 rounded mt-2">
        <a href="/blogs/{{$blog->id}}">Read More</a>
       
      </button>
    </div>

    <div class="px-6"   >
    <x-blog-tags  :tagsCsv="$blog->tags"/>
    </div>
   

  </div>
</x-card>

<!-- <x-card>

    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{
        $blog->logo ? asset('storage/'. $blog->logo)
        : asset('images/no-image.png')
        
        }}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/blogs/{{$blog->id}}">{{$blog->title}}</a>
            </h3>
            <div class="mb-4"></div>
           
            <x-blog-tags :tagsCsv="$blog->tags" />
        </div>
    </div>
</x-card> -->