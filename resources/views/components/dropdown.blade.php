@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-2 bg-white'])

@php
$alignmentClasses = match ($align) {
    'left' => 'dropdown-menu-start',
    'top' => '',
    default => 'dropdown-menu-end',
};

$width = match ($width) {
    '48' => 'w-48',
    default => $width,
};
@endphp

<div class="dropdown">
    <div class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        {{ $trigger }}
    </div>

    <div class="dropdown-menu {{ $alignmentClasses }} {{ $width }} shadow {{ $contentClasses }}">
        {{ $content }}
    </div>
</div>
