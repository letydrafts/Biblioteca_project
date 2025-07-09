<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Lista de Livros') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @role('admin')
                    <div class="mb-6">
                        <a href="{{ route('livros.create') }}"
                        class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                            + Criar Livro
                        </a>
                    </div>
                @endrole

                @foreach ($livros as $livro)
                    <div class="border-b border-gray-200 pb-4 mb-4">
                        <h3 class="text-lg font-bold text-gray-900">{{ $livro->nome }}</h3>
                        <p class="text-sm text-gray-600">
                            Categoria: {{ $livro->categoria->nome ?? 'N/A' }} |
                            Editora: {{ $livro->editora->nome ?? 'N/A' }}
                        </p>
                        <p class="text-sm mt-1 text-gray-700">ISBN: {{ $livro->isbn }}</p>

                        @php
                            $exemplarDisponivel = $livro->exemplares->firstWhere('status', 'disponivel');
                        @endphp

                        @if ($exemplarDisponivel)
                            <p class="mt-2 text-green-600 font-semibold">Disponível para reserva ou empréstimo</p>

                            <div class="mt-3 flex gap-3">
                                <form method="POST" action="{{ route('reservas.store') }}">
                                    @csrf
                                    <input type="hidden" name="exemplar_id" value="{{ $exemplarDisponivel->id }}">
                                    <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                        Reservar
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('emprestimos.store') }}">
                                    @csrf
                                    <input type="hidden" name="exemplar_id" value="{{ $exemplarDisponivel->id }}">
                                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                                        Emprestar
                                    </button>
                                </form>
                            </div>
                        @else
                            <p class="mt-2 text-red-600 font-semibold">Indisponível no momento</p>
                        @endif
                    </div>
                @endforeach

                @if ($livros->isEmpty())
                    <p class="text-gray-500">Nenhum livro cadastrado.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
