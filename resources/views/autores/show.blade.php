<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detalhes do Autor</h2>
    </x-slot>

    <div class="py-12 max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <div class="mb-4">
                <h3 class="text-lg font-semibold">Nome</h3>
                <p>{{ $autor->nome }}</p>
            </div>

            <div class="mt-6">
                <a href="{{ route('autores.index') }}" class="inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Voltar</a>
            </div>
        </div>
    </div>
</x-app-layout>
