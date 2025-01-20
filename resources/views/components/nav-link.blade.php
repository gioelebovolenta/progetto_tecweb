@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link active text-white fw-medium'
            : 'nav-link text-white fw-medium';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
