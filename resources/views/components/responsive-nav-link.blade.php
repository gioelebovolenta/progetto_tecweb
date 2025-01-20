@props(['active'])

@php
$classes = ($active ?? false)
            ? 'list-group-item list-group-item-action active text-white fw-bold'
            : 'list-group-item list-group-item-action text-dark fw-medium';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
