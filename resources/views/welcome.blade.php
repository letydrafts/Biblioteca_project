<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca Virtual</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800">
    <div class="min-h-screen flex flex-col items-center justify-center px-4">
        <div class="max-w-3xl text-center">
            <h1 class="text-5xl font-bold mb-4 text-indigo-700">The Academic Repository</h1>
            <p class="text-lg text-gray-600 mb-8">
                Explore, empreste e reserve os livros que deseja com facilidade. Faça login ou registre-se para começar a usar a plataforma.
            </p>

            <div class="flex justify-center space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 transition">
                        Ir para o Painel
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition">
                        Registrar
                    </a>
                @endauth
            </div>
        </div>
    </div>
</body>
</html>
