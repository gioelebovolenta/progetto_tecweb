@props(['label', 'name', 'placeholder' => 'Seleziona un valore'])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-white border border-gray-300 px-5 py-4 w-full'
    ];
@endphp

<x-forms.field :$label :$name>
    <select {{ $attributes($defaults) }}>
        <option value="" disabled selected>{{ $placeholder }}</option>
        {{ $slot }}
    </select>
</x-forms.field>
