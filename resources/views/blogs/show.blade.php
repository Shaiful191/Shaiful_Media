@php 
use Carbon\Carbon;

$dateString = $blog->created_at;

// Convert the string to a Carbon instance
$date = Carbon::parse($dateString);

// Format the date as desired
$formattedDate = $date->format('M d, Y');



@endphp






<x-layout>

    <div class="px-4 text-white bg-slate-800 pb-10 lg:pl-20">
        <x-card class="">

            <div class=" flex flex-col items-start justify-center text-center">
                <div class=" text-start">
                   

                    <div class="">
                        <img class="md:w-50 mr-6 mb-6 w-50 h-72" src="{{
       
        asset('images/card.jpg')
        
        }}" alt="" />
                    </div>
                    <!-- <div class="">
                        <img class="md:w-50 mr-6 mb-6 w-70 h-25" src="{{
        $blog->logo ? asset('storage/'. $blog->logo)
        : asset('images/no_image.jpg')
        
        }}" alt="" />
                    </div> -->

                    <div class="pr-5 ">
                        <h3 class="mb-2 text-start lg:text-6xl text-3xl font-bold text-white">{{$blog->title}}</h3>

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





                </div>
                <div>

                    <div class="font-sans text-lg space-y-6 text-slate-400 text-start pt-3">
                        <!-- {{$blog->description}} -->

                        {!! $blog->description !!}
                    </div>
                </div>
            </div>
        </x-card>


    </div>


</x-layout>