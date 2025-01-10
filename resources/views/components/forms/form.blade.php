<form {{ $attributes->except(['method'])->merge([
    'class' => 'max-w-2xl mx-auto space-y-6',
    'method' => $attributes->get('method', 'GET') === 'GET' ? 'GET' : 'POST',
    'enctype' => $attributes->get('enctype') // Mantieni il multipart/form-data
]) }}>
    @if ($attributes->get('method', 'GET') !== 'GET')
        @csrf
        @method($attributes->get('method'))
    @endif

    {{ $slot }}
</form>
