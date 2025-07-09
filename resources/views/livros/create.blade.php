<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Cadastrar Livro') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-md rounded-md">
                <form method="POST" action="{{ route('livros.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700">Nome:</label>
                        <input type="text" name="nome" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">ISBN:</label>
                        <input type="text" name="isbn" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Categoria:</label>
                        <select name="categoria_id" class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Editora:</label>
                        <select name="editora_id" class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            @foreach($editoras as $editora)
                                <option value="{{ $editora->id }}">{{ $editora->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
