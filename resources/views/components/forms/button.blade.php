@props(['href' => null, 'type' => 'button'])

@if ($href)
    <!-- Usa un'ancora se l'attributo href è presente -->
    <a {{ $attributes->merge(['href' => $href, 'class' => 'text-xl bg-blue-700 rounded-lg py-2 px-6 font-bold text-white hover:bg-blue-600 shadow transition-colors duration-300']) }}>
        {{ $slot }}
    </a>
@else
    <!-- Usa un pulsante se href non è presente -->
    <button {{ $attributes->merge(['type' => $type, 'class' => 'text-xl bg-blue-700 rounded-lg py-2 px-6 font-bold text-white hover:bg-blue-600 shadow transition-colors duration-300']) }}>
        {{ $slot }}
    </button>
@endif
