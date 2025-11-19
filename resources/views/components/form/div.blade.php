<div {{ $attributes->class([
    'grid'
]) }}>
    <label for="" class="font-semibold uppercase text-sm">{{ $title }}</label>
    {{ $slot }}
</div>