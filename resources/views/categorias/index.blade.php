{{-- resources/views/categorias/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Categorias</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('categorias.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Nova Categoria</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nome</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Código</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td class="px-6 py-4">{{ $categoria->id }}</td>
                                <td class="px-6 py-4">{{ $categoria->nome }}</td>
                                <td class="px-6 py-4">{{ $categoria->codigo_classificacao }}</td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="{{ route('categorias.show', $categoria) }}" class="text-blue-500 hover:underline">Ver</a>
                                    <a href="{{ route('categorias.edit', $categoria) }}" class="text-yellow-500 hover:underline">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="p-4">
                    {{ $categorias->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
