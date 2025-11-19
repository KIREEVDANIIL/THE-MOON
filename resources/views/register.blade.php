<x-layout title="Регистрация">
    <x-section title="Регистрация">
        <!-- Сообщения об успехе -->
        @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
        @endif

        <!-- Сообщения об ошибках -->
        @if($errors->any())
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="shadow-md grid gap-y-6 p-8 w-full lg:w-2/3 justify-self-center">
            @csrf
            
            <x-form.div title="Фамилия">
                <input type="text" name="surname" value="{{ old('surname') }}" 
                       class="border border-gray-200 p-2 w-full rounded focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       required autofocus>
            </x-form.div>
            
            <x-form.div title="Имя">
                <input type="text" name="name" value="{{ old('name') }}" 
                       class="border border-gray-200 p-2 w-full rounded focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       required>
            </x-form.div>
            
            <x-form.div title="Логин">
                <input type="text" name="login" value="{{ old('login') }}" 
                       class="border border-gray-200 p-2 w-full rounded focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       required>
                @error('login')
                    <x-form.error>{{ $message }}</x-form.error>
                @enderror
            </x-form.div>
            
            <x-form.div title="Email">
                <input type="email" name="email" value="{{ old('email') }}" 
                       class="border border-gray-200 p-2 w-full rounded focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       required>
                @error('email')
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
            
            <x-form.div title="Подтвердите пароль">
                <input type="password" name="password_confirmation" 
                       class="border border-gray-200 p-2 w-full rounded focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       required>
            </x-form.div>
            
            <x-form.div title="Согласие с правилами регистрации">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="rules" value="1" 
                           class="border border-gray-200 rounded focus:ring-2 focus:ring-blue-500"
                           {{ old('rules') ? 'checked' : '' }}>
                    <span class="text-sm text-gray-600">Я принимаю условия соглашения</span>
                </label>
                @error('rules')
                    <x-form.error>{{ $message }}</x-form.error>
                @enderror
            </x-form.div>
            
            <x-form.button>Зарегистрироваться</x-form.button>

            <!-- Ссылка на вход -->
            <div class="text-center pt-4 border-t border-gray-200">
                <p class="text-gray-600">
                    Уже есть аккаунт? 
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                        Войти
                    </a>
                </p>
            </div>
        </form>
    </x-section>
</x-layout>