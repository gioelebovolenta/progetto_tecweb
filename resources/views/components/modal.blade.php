@props([
    'name',
    'show' => false,
    'maxWidth' => 'lg'
])

@php
$maxWidth = match ($maxWidth) {
    'sm' => 'modal-sm',
    'md' => '',
    'lg' => 'modal-lg',
    'xl' => 'modal-xl',
    default => 'modal-lg',
};
@endphp

<div
    class="modal fade"
    id="{{ $name }}"
    tabindex="-1"
    aria-labelledby="{{ $name }}Label"
    aria-hidden="true"
>
    <div class="modal-dialog {{ $maxWidth }}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $name }}Label">{{ $title ?? '' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            @if (isset($footer))
                <div class="modal-footer">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>
