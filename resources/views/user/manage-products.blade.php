<x-layout>
    <x-slot name="header">
        <h2 class="h4 fw-bold text-dark">
            {{ __('Gestisci Materiale in Vendita') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="py-5">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">{{ __('Titolo') }}</th>
                                <th scope="col">{{ __('Prezzo') }}</th>
                                <th scope="col">{{ __('Azione') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr id="product-{{ $product->id }}">
                                <td>{{ $product->title }}</td>
                                <td>{{ number_format($product->price, 2, '.', '') }} €</td>
                                <td>
                                    <a href="{{ route('user.edit-product', $product->id) }}" class="btn btn-warning btn-sm">
                                        {{ __('Modifica') }}
                                    </a>
                                    <button class="delete-product btn btn-danger btn-sm" data-id="{{ $product->id }}">
                                        {{ __('Elimina') }}
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Aggiunta di un token CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</x-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('.delete-product').click(function () {
            var productId = $(this).data('id');
            var token = $('meta[name="csrf-token"]').attr('content');

            if (confirm('Sei sicuro di voler eliminare questo prodotto?')) {
                $.ajax({
                    url: '/user/delete-product/' + productId,
                    type: 'DELETE',
                    data: {
                        "_token": token
                    },
                    success: function (response) {
                        if (response.success) {
                            $('#product-' + productId).remove();
                            alert('Prodotto eliminato con successo.');
                        } else {
                            alert('Errore durante l\'eliminazione del prodotto.');
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                        alert('Errore durante l\'eliminazione del prodotto.');
                    }
                });
            }
        });
    });
</script>
