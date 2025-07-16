<?php

namespace App\Http\Controllers;

use App\Models\Exemplar;
use App\Models\Livro;
use Illuminate\Http\Request;

class ExemplarController extends Controller
{

    public function index()
    {
        $exemplares = Exemplar::with('livro')->paginate(10);
        return view('exemplares.index', compact('exemplares'));
    }


    public function create()
    {
        $livros = Livro::all();
        return view('exemplares.create', compact('livros'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|integer|unique:exemplares,codigo',
            'status' => 'required|string',
            'livro_id' => 'required|exists:livros,id',
        ]);

        Exemplar::create($request->all());

        return redirect()->route('exemplares.index')->with('success', 'Exemplar criado com sucesso!');
    }


    public function show(Exemplar $exemplar)
    {
        return view('exemplares.show', compact('exemplar'));
    }

    public function edit(Exemplar $exemplar)
    {
        $livros = Livro::all();
        return view('exemplares.edit', compact('exemplar', 'livros'));
    }


    public function update(Request $request, Exemplar $exemplar)
    {
        $request->validate([
            'codigo' => 'required|integer|unique:exemplares,codigo,' . $exemplar->id,
            'status' => 'required|string',
            'livro_id' => 'required|exists:livros,id',
        ]);

        $exemplar->update($request->all());

        return redirect()->route('exemplares.index')->with('success', 'Exemplar atualizado com sucesso!');
    }


    public function destroy(Exemplar $exemplar)
    {
        $exemplar->delete();
        return redirect()->route('exemplares.index')->with('success', 'Exemplar excluído com sucesso!');
    }
}
