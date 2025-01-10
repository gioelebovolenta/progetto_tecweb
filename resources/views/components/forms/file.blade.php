@props(['label', 'name', 'accept' => 'application/pdf'])

@php
    $defaults = [
        'type' => 'file',
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-white border border-white/10 px-5 py-4 w-full',
        'accept' => $accept,
    ];
@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes($defaults) }}>
</x-forms.field>
