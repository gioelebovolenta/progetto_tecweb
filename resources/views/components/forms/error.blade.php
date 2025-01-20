@if ($errors->has($name))
    <div {{ $attributes->merge(['class' => 'text-danger small']) }}>
        {{ $errors->first($name) }}
    </div>
@endif
