<x-layout>
    <x-slot name="header">
        <h2 class="h4 fw-bold text-dark">
            {{ __('Materiale Acquistato') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">{{ __('Titolo') }}</th>
                                <th scope="col" class="text-end">{{ __('Azione') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchasedProducts as $product)
                            <tr>
                                <td class="align-middle">{{ $product->title }}</td>
                                <td class="text-end">
                                    <a href="{{ route('products.download', $product->id) }}" class="btn btn-primary btn-sm">
                                        {{ __('Scarica') }}
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
