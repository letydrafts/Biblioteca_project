<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Autor</h2>
    </x-slot>

    <div class="py-12 max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm rounded-lg p-6">

            <form method="POST" action="{{ route('autores.update', $autor) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input type="text" name="nome" id="nome" value="{{ old('nome', $autor->nome) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @error('nome')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('autores.index') }}" class="text-gray-600 hover:underline mr-4">Cancelar</a>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
