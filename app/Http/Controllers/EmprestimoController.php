<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\User;
use App\Models\Exemplar;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{

    public function index()
{
    if (auth()->user()->hasRole('admin')) {

        $emprestimos = Emprestimo::with(['user', 'exemplar.livro'])->paginate(10);
    } else {

        $emprestimos = Emprestimo::with(['exemplar.livro'])
            ->where('user_id', auth()->id())
            ->whereNull('data_devolucao')
            ->paginate(10);
    }

    return view('emprestimos.index', compact('emprestimos'));
}

    public function create()
    {
        $usuarios = User::all();
        $exemplares = Exemplar::all();

        return view('emprestimos.create', compact('usuarios', 'exemplares'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'data_empréstimo' => 'required|date',
            'data_devolucao' => 'required|date|after_or_equal:data_empréstimo',
            'user_id' => 'required|exists:users,id',
            'exemplar_id' => 'required|exists:exemplares,id',
        ]);

        Emprestimo::create($request->all());

        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo registrado com sucesso!');
    }

    public function show(Emprestimo $emprestimo)
    {
        return view('emprestimos.show', compact('emprestimo'));
    }


    public function edit(Emprestimo $emprestimo)
    {
        $usuarios = User::all();
        $exemplares = Exemplar::all();

        return view('emprestimos.edit', compact('emprestimo', 'usuarios', 'exemplares'));
    }


    public function update(Request $request, Emprestimo $emprestimo)
    {
        $request->validate([
            'data_empréstimo' => 'required|date',
            'data_devolucao' => 'required|date|after_or_equal:data_empréstimo',
            'user_id' => 'required|exists:users,id',
            'exemplar_id' => 'required|exists:exemplares,id',
        ]);

        $emprestimo->update($request->all());

        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo atualizado com sucesso!');
    }

    public function destroy(Emprestimo $emprestimo)
    {
        $emprestimo->delete();

        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo excluído com sucesso!');
    }
}
