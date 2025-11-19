<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="flex flex-col h-screen bg-gray-50">
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">

                <div>
                    <x-link href="{{ route('home') }}" class="flex items-center gap-x-3 text-gray-800 hover:text-blue-600 transition-colors">
                        <img src="public/logo.png" alt="Copy Master" class="h-8 w-8 rounded-lg">
                        <span class="text-xl font-bold">Copy Master</span>
                    </x-link>
                </div>
                

                <nav class="flex gap-x-8">
                    <x-link href="{{ route('about') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
                        О нас
                    </x-link>
                    <x-link href="{{ route('catalog') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
                        Каталог
                    </x-link>
                    <x-link href="{{ route('where') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
                        Где нас найти?
                    </x-link>
                </nav>

                
                <ul class="flex gap-x-6 items-center">
                    @guest
                        <li>
                            <x-link href="{{ route('register') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
                                Регистрация
                            </x-link>
                        </li>
                        <li>
                            <x-link href="{{ url('/admin') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
                                Аутентификация
                            </x-link>
                        </li>
                    @endguest
                    @auth
                        <li>
                            <x-link href="{{ route('basket') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
                                Корзина
                            </x-link>
                        </li>
                        @if(Auth::user()->isAdmin())
                            <li>
                                <x-link href="{{ route('admin.index') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
                                    Админ панель
                                </x-link>
                            </li>
                        @endif
                        <li>
                            <x-link href="{{ route('logout.get') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
                                <span>Выход</span>
                            </x-link>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </header>

    <main class="flex-grow">
        {{ $slot }}
    </main>


</body>
</html>