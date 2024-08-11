<x-layout>

    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1 text-white">
                Edit Blog
            </h2>
            <p class="mb-4 text-white">Edit: {{$blog->title}}</p>
        </header>

        <form method="POST" action="/blogs/{{$blog->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2 text-white">Job Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" placeholder="Example: Senior Laravel Developer" value="{{$blog->title}}" />
                @error('title')
                <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
                @enderror

            </div>


            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2 text-white">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" value="{{$blog->tags}}" placeholder="Example: Laravel, Backend, Postgres, etc" />
                @error('tags')
                <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2 text-white">
                    Company Logo
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
                <img class="w-48 mr-6 mb-6" src="{{
        $blog->logo ? asset('storage/'. $blog->logo)
        : asset('images/no-image.png')
        
        }}" alt="" />


                @error('logo')
                <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
                @enderror


            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2 text-white">
                    Blog Description
                </label>
                <textarea id="editor" class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="Include tasks, requirements, salary, etc">
                {{$blog->description}}
                </textarea>
                @error('description')
                <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <button class="bg-black text-white rounded py-2 px-4 hover:bg-black">
                    Update Blog
                </button>

                <a href="/" class="text-white ml-4"> Back </a>
            </div>
        </form>
    </x-card>



</x-layout>