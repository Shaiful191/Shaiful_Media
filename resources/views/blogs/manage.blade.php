<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center text-white font-bold my-6 uppercase">
                Manage blogs
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm text-white">
            <tbody>

                @unless($blogs->isEmpty())
                @foreach($blogs as $blog)
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="show.html">
                            {{$blog->title}}
                        </a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/blogs/{{$blog->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-pen-to-square"></i>
                            Edit</a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <form method="POST" action="/blogs/{{$blog->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="border-grey-300">
                    <td class="px-4 py-8 border-t border-b border-grey-300 text-lg">
                        <p class="text-center">
                            No blogs Found
                        </p>
                    </td>
                </tr>
                @endunless


            </tbody>
        </table>
    </x-card>
</x-layout>