@props(['label', 'name', 'prefix' => null])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-white border border-white/10 px-5 py-4 w-full',
        'value' => old($name),
    ];
@endphp

<x-forms.field :$label :$name>
    <div class="relative">
        @if ($prefix)
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                {{ $prefix }}
            </span>
        @endif
        <input {{ $attributes($defaults) }} class="{{ $prefix ? 'pl-10' : '' }}">
    </div>
</x-forms.field>
