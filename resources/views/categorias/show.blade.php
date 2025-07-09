{{-- resources/views/categorias/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detalhes da Categoria</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded p-6">
                <p><strong>ID:</strong> {{ $categoria->id }}</p>
                <p><strong>Nome:</strong> {{ $categoria->nome }}</p>
                <p><strong>Código de Classificação:</strong> {{ $categoria->codigo_classificacao }}</p>
                <p><strong>Criado em:</strong> {{ $categoria->created_at->format('d/m/Y H:i') }}</p>

                <div class="mt-4 flex justify-end">
                    <a href="{{ route('categorias.edit', $categoria) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 mr-2">Editar</a>
                    <a href="{{ route('categorias.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

