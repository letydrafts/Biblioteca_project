<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\User;
use App\Models\Exemplar;
use Illuminate\Http\Request;

class ReservaController extends Controller
{

    public function index()
    {
        $reservas = Reserva::with(['user', 'exemplar'])->get();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {

        abort_unless(auth()->user()->hasRole('admin'), 403);


        $usuarios = User::all();
        $exemplares = Livro::all();

        return view('reservas.create', compact('usuarios', 'livros'));
    }

    public function solicitarReserva(Request $request)
{
    $request->validate([
        'livro_id' => 'required|exists:livros,id',
    ]);

    Reserva::create([
        'user_id' => auth()->id(),
        'livro_id' => $request->livro_id,
        'status' => 'pendente',
        'data_reserva' => now(),
    ]);

    return redirect()->route('livros.index')->with('success', 'Reserva solicitada com sucesso!');
}

        public function store(Request $request)
{
    $request->validate([
        'data_reserva' => 'required|date',
        'status' => 'required|string|max:50',
        'user_id' => 'required|exists:users,id',
        'livro_id' => 'required|exists:livros,id',

    ]);

    Reserva::create([
        'data_reserva' => $request->data_reserva,
        'status' => $request->status,
        'user_id' => $request->user_id,
        'livro_id' => $request->livro_id,
        'exemplar_id' => null,
    ]);

    return redirect()->route('reservas.index')->with('success', 'Reserva criada com sucesso!');
    }


    public function show(Reserva $reserva)
    {
        return view('reservas.show', compact('reserva'));
    }


    public function edit(Reserva $reserva)
    {
        $usuarios = User::all();
        $exemplares = Exemplar::all();
        $livros = Livro::all();

        return view('reservas.edit', compact('reserva', 'usuarios', 'exemplares'));
    }


    public function update(Request $request, Reserva $reserva)
{
    $request->validate([
        'data_reserva' => 'required|date',
        'status' => 'required|string|max:50',
        'user_id' => 'required|exists:users,id',
        'livro_id' => 'required|exists:livros,id',
        'exemplar_id' => 'required|exists:exemplares,id', 
    ]);

    $reserva->update($request->all());

    return redirect()->route('reservas.index')->with('success', 'Reserva atualizada com sucesso!');
}


    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        return redirect()->route('reservas.index')->with('success', 'Reserva excluída com sucesso!');
    }
}
