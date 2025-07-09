<?php

namespace App\Http\Controllers;

use App\Models\Multa;
use App\Models\Emprestimo;
use App\Models\User;
use Illuminate\Http\Request;

class MultaController extends Controller
{

    public function index()
    {
        $multas = Multa::with(['user', 'emprestimo'])->get();
        return view('multas.index', compact('multas'));
    }


    public function create()
    {
        $usuarios = User::all();
        $emprestimos = Emprestimo::all();
        return view('multas.create', compact('usuarios', 'emprestimos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dias_multa' => 'required|integer|min:1',
            'motivo' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'emprestimo_id' => 'required|exists:emprestimos,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Multa::create($request->all());

        return redirect()->route('multas.index')->with('success', 'Multa registrada com sucesso!');
    }

    public function show(Multa $multa)
    {
        return view('multas.show', compact('multa'));
    }


    public function edit(Multa $multa)
    {
        $usuarios = User::all();
        $emprestimos = Emprestimo::all();
        return view('multas.edit', compact('multa', 'usuarios', 'emprestimos'));
    }


    public function update(Request $request, Multa $multa)
    {
        $request->validate([
            'dias_multa' => 'required|integer|min:1',
            'motivo' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'emprestimo_id' => 'required|exists:emprestimos,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $multa->update($request->all());

        return redirect()->route('multas.index')->with('success', 'Multa atualizada com sucesso!');
    }


    public function destroy(Multa $multa)
    {
        $multa->delete();
        return redirect()->route('multas.index')->with('success', 'Multa excluída com sucesso!');
    }
}

