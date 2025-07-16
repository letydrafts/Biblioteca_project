<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Reservas</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4">
                @if(auth()->user()->hasRole('admin') || auth()->user()->can('create reserva'))
                    <a href="{{ route('reservas.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Nova Reserva</a>
                @endif
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            @if(auth()->user()->hasRole('admin'))
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Usuário</th>
                            @endif
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Exemplar</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Data da Reserva</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Ações</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($reservas as $reserva)
                            <tr>
                                @if(auth()->user()->hasRole('admin'))
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->user->name }}</td>
                                @endif
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reserva->exemplar->codigo }} - {{ $reserva->exemplar->livro->nome }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($reserva->data_reserva)->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap capitalize">{{ $reserva->status }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                                    <a href="{{ route('reservas.show', $reserva) }}" class="text-blue-500 hover:underline">Ver</a>
                                    @if(auth()->user()->hasRole('admin'))
                                        <a href="{{ route('reservas.edit', $reserva) }}" class="text-yellow-500 hover:underline">Editar</a>
                                        <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir esta reserva?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ auth()->user()->hasRole('admin') ? 5 : 4 }}" class="px-6 py-4 text-center text-gray-500">Nenhuma reserva encontrada.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="p-4">
                    {{ $reservas->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>