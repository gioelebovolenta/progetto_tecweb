<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-danger text-uppercase fw-bold shadow-sm']) }}>
    {{ $slot }}
</button>
