<x-layout title="Аутентификация">
    <x-section title="Аутентификация">
        <!-- Сообщения об успехе -->
        @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
        @endif

        <!-- Сообщения об ошибках -->
        @if($errors->any())
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="shadow-md grid gap-y-6 p-8 w-full lg:w-2/3 justify-self-center">
            @csrf
            
            <x-form.div title="Логин или Email">
                <input type="text" name="login" value="{{ old('login') }}" 
                       class="border border-gray-200 p-2 w-full rounded focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       required autofocus>
                @error('login')
                    <x-form.error>{{ $message }}</x-form.error>
                @enderror
            </x-form.div>
            
            <x-form.div title="Пароль">
                <input type="password" name="password" 
                       class="border border-gray-200 p-2 w-full rounded focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       required>
                @error('password')
                    <x-form.error>{{ $message }}</x-form.error>
                @enderror
            </x-form.div>

            <!-- Запомнить меня -->
            <div class="flex items-center justify-between">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" 
                           class="border border-gray-200 rounded focus:ring-2 focus:ring-blue-500">
                    <span class="text-sm text-gray-600">Запомнить меня</span>
                </label>
            </div>

            <x-form.button>Войти</x-form.button>

            <!-- Ссылка на регистрацию -->
            <div class="text-center pt-4 border-t border-gray-200">
                <p class="text-gray-600">
                    Нет аккаунта? 
                    <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                        Зарегистрироваться
                    </a>
                </p>
            </div>
        </form>
    </x-section>
</x-layout>