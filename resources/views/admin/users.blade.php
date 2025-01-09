<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestisci Utenti') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Form di ricerca -->
            <div class="mb-6">
                <form method="GET" action="{{ route('admin.users.index') }}" class="flex space-x-4">
                    <input 
                        type="text" 
                        name="query" 
                        placeholder="Cerca utenti" 
                        class="border rounded px-4 py-2 w-full sm:w-1/2 focus:outline-none focus:ring focus:ring-blue-300"
                    >
                    <button 
                        type="submit" 
                        class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-2 rounded font-semibold"
                    >
                        Cerca
                    </button>
                </form>
            </div>

            <!-- Tabella utenti -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <table class="min-w-full table-auto text-center">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 text-sm font-semibold text-gray-600 text-left">
                                Nome
                            </th>
                            <th class="px-6 py-3 text-sm font-semibold text-gray-600 text-left">
                                Email
                            </th>
                            <th class="px-6 py-3 text-sm font-semibold text-gray-600 text-left">
                                Azione
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-800 text-left">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 text-left">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 text-left">
                                <form method="POST" action="{{ route('admin.users.delete', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="bg-red-600 hover:bg-red-800 text-white px-4 py-2 rounded font-semibold"
                                    >
                                        Elimina
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Paginazione -->
            <div class="mt-6">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
