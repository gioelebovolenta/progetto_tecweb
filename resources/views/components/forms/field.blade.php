<div class="mb-3">
    <label for="{{ $name }}" class="form-label">
        {{ $label ?? ucfirst($name) }}
    </label>
    <input id="{{ $name }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'form-control']) }}>
</div>
