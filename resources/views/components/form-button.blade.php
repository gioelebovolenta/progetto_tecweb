<button {{ $attributes->merge(['class' => 'btn btn-primary btn-sm shadow', 'type' => 'submit']) }}>
    {{ $slot }}
</button>
