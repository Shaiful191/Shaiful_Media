<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- use link for alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <script>
        module.exports = {
            // ... other configurations
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                },
            },
            // ... other configurations
        };
    </script>

    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css" />
    <script type="importmap">
        {
                "imports": {
                    "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
                    "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
                }
            }
        </script>

    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph
        } from 'ckeditor5';

        ClassicEditor
            .create(document.querySelector('#editor'), {
                plugins: [Essentials, Bold, Italic, Font, Paragraph],
                toolbar: {
                    items: [
                        'undo', 'redo', '|', 'bold', 'italic', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                    ]
                }
            })
            .then( /* ... */ )
            .catch( /* ... */ );
    </script>
    <title>ShaifulMedia</title>
</head>

<body class="min-h-screen flex flex-col">
    <nav class="bg-slate-800 flex justify-between items-center p-5 pb-16">

        <a href="/">
            <p class="btn btn-ghost text-2xl font-bold text-slate-400 lg:pl-16 ">ShaifulMedia</p>
        </a>
        <!-- <a href="/"><img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo" /></a> -->


        <ul class="flex flex-col md:flex-row space-x-6 mr-6 text-lg text-slate-400">

            @auth
            <li>
                <span class="font-bold uppercase hidden md:block">
                    Welcome {{auth()->user()->name}}
                </span>
            </li>

            <li>
                <a href="/blogs/manage" class="md:flex-col hover:text-indigo-500"><i class="fa-solid fa-gear"></i>
                    Manage blogs</a>
            </li>

            <li>
                <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="hover:text-indigo-500 md:flex-col">
                        <i class="fa-solid fa-door-closed"></i>

                        Logout
                    </button>
                </form>
            </li>
            @else
            <!-- <li>
                <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
           
           
            </li> -->
            <li>
                <a href="/login" class="hover:text-indigo-500 lg:pr-3"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Admin Login</a>
            </li>

            @endauth
        </ul>
    </nav>

    <main class="flex-grow bg-slate-800">
        <!-- View Output -->
        {{$slot}}
    </main>


    <footer class="bottom-0 w-full flex items-center font-bold bg-black text-white h-24 opacity-90 justify-center">
        <p class="ml-2">Copyright &copy; 2024, All Rights reserved</p>
        @auth
        <a href="/blogs/create" class="absolute right-10 text-black py-2 px-5 bg-slate-400">Post Blog</a>
        @endauth
    </footer>

    <x-flash-message>

    </x-flash-message>
</body>

</html>