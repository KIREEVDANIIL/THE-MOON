<form method="POST" action="{{ route('logout') }}" class="inline">
    @csrf
    <button type="submit" {{ $attributes->merge(['class' => 'text-blue-600 hover:text-blue-800 underline']) }}>
        {{ $slot }}
    </button>
</form>