<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="https://flowbite.com/docs/images/logo.svg" type="image/x-icon">
    <title>CareerConnect</title>
</head>

<body class="bg-gray-900 h-full">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap justify-between items-center mx-auto px-12 py-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">CareerConnect</span>
            </a>
            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                @auth
                    <span class="font-bold uppercase text-white">
                        Welcome, {{ auth()->user()->name }}
                    </span>
                    <form class="inline hover:text-blue-500 text-white" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i> Logout
                        </button>
                    </form>
                @else
                    <a href="/register" class="hover:text-blue-500 text-white"><i class="fa-solid fa-user-plus"></i>
                        Register</a>
                    <a href="/login" class="hover:text-blue-500 text-white"><i
                            class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                @endauth
            </div>
        </div>
    </nav>


    <main {{ $attributes->merge(['class' => 'h-full']) }} style="margin-top: -64px">
        {{ $slot }}
    </main>

    <x-flash-message />

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
