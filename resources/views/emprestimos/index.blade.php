<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Empréstimos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            @if(auth()->user()->hasRole('admin'))
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Usuário</th>
                            @endif
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Livro</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Data Empréstimo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Data Devolução</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($emprestimos as $emprestimo)
                            <tr>
                                @if(auth()->user()->hasRole('admin'))
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $emprestimo->user->name }}</td>
                                @endif
                                <td class="px-6 py-4 whitespace-nowrap">{{ $emprestimo->exemplar->livro->nome }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $emprestimo->data_empréstimo->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $emprestimo->data_devolucao ? $emprestimo->data_devolucao->format('d/m/Y') : '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if(is_null($emprestimo->data_devolucao))
                                        <span class="text-green-600 font-semibold">Ativo</span>
                                    @else
                                        <span class="text-gray-500">Finalizado</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ auth()->user()->hasRole('admin') ? 5 : 4 }}" class="px-6 py-4 text-center text-gray-500">
                                    Nenhum empréstimo encontrado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="p-4">
                    {{ $emprestimos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
