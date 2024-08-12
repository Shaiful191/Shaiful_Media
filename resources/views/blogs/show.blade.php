@php 
use Carbon\Carbon;

$dateString = $blog->created_at;

// Convert the string to a Carbon instance
$date = Carbon::parse($dateString);

// Format the date as desired
$formattedDate = $date->format('M d, Y');



@endphp






<x-layout>

    <div class="px-4 text-white bg-slate-800 pb-10">
        <x-card class="">

            <div class=" flex flex-col items-start justify-center text-center">
                <div class=" md:flex md:flex-row md:text-start">
                    <div class="pr-5 flex-col-2">
                        <h3 class="mb-2 text-start text-6xl font-bold text-white">{{$blog->title}}</h3>

                        <div class="text-start pt-3">
                            <x-blog-tags :tagsCsv="$blog->tags" />

                        </div>
                        <div class="text-start pb-3">
                        {{$formattedDate}}

                        </div>
                        <div class="text-start pb-3">
                        {{"By Shaiful Islam"}}

                        </div>

                    </div>

                    <div class="flex-col-1">
                        <img class="md:w-50 mr-6 mb-6 w-200 h-150" src="{{
        $blog->logo ? asset('storage/'. $blog->logo)
        : asset('images/no_image.jpg')
        
        }}" alt="" />
                    </div>


                </div>
                <div>

                    <div class="text-lg space-y-6 text-slate-400 text-start pt-3">
                        <!-- {{$blog->description}} -->

                        {!! $blog->description !!}
                    </div>
                </div>
            </div>
        </x-card>


    </div>


</x-layout>