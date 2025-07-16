<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Livros</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @role('admin')
            <div class="mb-4">
                <a href="{{ route('livros.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Novo Livro</a>
            </div>
            @endrole

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nome</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ISBN</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Categoria</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Editora</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($livros as $livro)
                            @php
                                $disponivel = $livro->exemplares->where('emprestado', false)->count() > 0;
                            @endphp
                            <tr>
                                <td class="px-6 py-4">{{ $livro->id }}</td>
                                <td class="px-6 py-4">{{ $livro->nome }}</td>
                                <td class="px-6 py-4">{{ $livro->isbn }}</td>
                                <td class="px-6 py-4">{{ $livro->categoria->nome }}</td>
                                <td class="px-6 py-4">{{ $livro->editora->nome }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-2 py-1 rounded text-xs font-semibold {{ $disponivel ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $disponivel ? 'Disponível' : 'Indisponível' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="{{ route('livros.show', $livro) }}" class="text-blue-500 hover:underline">Ver</a>
                                    @role('admin')
                                        <a href="{{ route('livros.edit', $livro) }}" class="text-yellow-500 hover:underline">Editar</a>
                                    @else
                                        @if ($disponivel)
                                            <form action="{{ route('reservas.store') }}" method="POST" class="inline">
                                                @csrf
                                                <input type="hidden" name="livro_id" value="{{ $livro->id }}">
                                                <button type="submit" class="text-green-600 hover:underline">Reservar</button>
                                            </form>
                                        @endif
                                    @endrole
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>