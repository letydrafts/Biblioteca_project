<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Detalhes do Livro') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-md rounded-md">
                <h3 class="text-xl font-bold mb-4">{{ $livro->nome }}</h3>

                <p><strong>ISBN:</strong> {{ $livro->isbn }}</p>
                <p><strong>Categoria:</strong> {{ $livro->categoria->nome ?? 'N/A' }}</p>
                <p><strong>Editora:</strong> {{ $livro->editora->nome ?? 'N/A' }}</p>

                <div class="mt-6">
                    <a href="{{ route('livros.index') }}" class="text-blue-600 hover:underline">← Voltar à lista</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
