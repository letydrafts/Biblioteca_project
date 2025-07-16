<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes da Reserva') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm rounded-lg p-6">

            <div class="mb-4">
                <h3 class="text-lg font-semibold">Usuário</h3>
                <p>{{ $reserva->user->name }} ({{ $reserva->user->email }})</p>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold">Exemplar</h3>
                <p><strong>Livro:</strong> {{ $reserva->exemplar->livro->nome }}</p>
                <p><strong>Código do exemplar:</strong> {{ $reserva->exemplar->codigo }}</p>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold">Data da Reserva</h3>
                <p>{{ \Carbon\Carbon::parse($reserva->data_reserva)->format('d/m/Y') }}</p>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold">Status</h3>
                <p>{{ ucfirst($reserva->status) }}</p>
            </div>

            <div class="mt-6">
                <a href="{{ route('reservas.index') }}" class="inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Voltar para Reservas
                </a>
            </div>
        </div>
    </div>
</x-app-layout>