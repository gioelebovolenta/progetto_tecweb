<div class="form-check">
    <input type="checkbox" {{ $attributes->merge(['class' => 'form-check-input']) }}>
    <label class="form-check-label">
        {{ $slot }}
    </label>
</div>
