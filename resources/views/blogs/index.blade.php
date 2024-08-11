<x-layout >
@include('pertials._hero')
@include('pertials._search')
<div class="item-center justify-center bg-gray-900">

    <p class="text-4xl font-bold text-slate-400 text-center font-bold p-8 mb-5">
      All Blogs List
    </p>
    <div class="lg:grid lg:grid-cols-3 gap-7   space-y-4 md:space-y-0 mx-8">

        @if(count($blogs)==0)

        <p class="text-4xl font-bold text-center font-bold m-14">
            No blogs found!
        </p>
        @endif


        @foreach($blogs as $blog)
        <x-blog-card :blog="$blog" />
        @endforeach

    </div>

    <div class="mt-6 p-4">
        {{$blogs->links()}}
    </div>

    <div class="pb-15">

    </div>
   </div>
 

</x-layout>