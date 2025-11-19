<x-layout title="О нас">
    <x-section title="О нас">

<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <h1 class="text-3xl font-bold text-center mb-8">О нашей компании</h1>
            
            <div class="prose max-w-none">
                <p class="text-lg mb-4">
                    Добро пожаловать на наш сайт! Мы рады, что вы присоединились к нашему сообществу.
                </p>
                
                <div class="grid md:grid-cols-2 gap-8 mt-8">
                    <div>
                        <h2 class="text-2xl font-semibold mb-4">Наша миссия</h2>
                        <p class="text-gray-700">
                            Мы стремимся предоставлять лучшие услуги для наших клиентов 
                            и создавать ценность для каждого пользователя.
                        </p>
                    </div>
                    
                    <div>
                        <h2 class="text-2xl font-semibold mb-4">Контакты</h2>
                        <p class="text-gray-700">
                            Email: info@example.com<br>
                            Телефон: +7 (999) 999-99-99<br>
                            Адрес: г. Усть-Катав ул. Ленина 42
                        </p>
                    </div>
                </div>


                @auth
                    <div class="mt-8 p-6 bg-blue-50 rounded-lg">
                        <h3 class="text-xl font-semibold mb-4">Ваш профиль</h3>
                        <p><strong>Фамилия:</strong> {{ auth()->user()->surname }}</p>
                        <p><strong>Отчество:</strong> {{ auth()->user()->patronymic }}</p>
                        <p><strong>Логин:</strong> {{ auth()->user()->login }}</p>
                        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                    </div>
                @endauth
            </div>
        </div>
    </div>
    </x-section>
</x-layout>