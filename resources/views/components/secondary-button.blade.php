<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-light text-uppercase fw-semibold shadow-sm']) }}>
    {{ $slot }}
</button>
