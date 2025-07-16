<?php

namespace App\Http\Controllers;

use App\Models\Editora;
use Illuminate\Http\Request;

class EditoraController extends Controller
{

    public function index()
    {
        $editoras = Editora::paginate(10);
        return view('editoras.index', compact('editoras'));
    }


    public function create()
    {
        return view('editoras.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|string|max:20',
            'email' => 'required|email',
            'telefone' => 'required|string|max:20',
            'site' => 'nullable|url',
        ]);

        Editora::create($request->all());

        return redirect()->route('editoras.index')->with('success', 'Editora criada com sucesso!');
    }


    public function show(Editora $editora)
    {
        return view('editoras.show', compact('editora'));
    }

    /**
     * Mostra o formulário de edição.
     */
    public function edit(Editora $editora)
    {
        return view('editoras.edit', compact('editora'));
    }


    public function update(Request $request, Editora $editora)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|string|max:20',
            'email' => 'required|email',
            'telefone' => 'required|string|max:20',
            'site' => 'nullable|url',
        ]);

        $editora->update($request->all());

        return redirect()->route('editoras.index')->with('success', 'Editora atualizada com sucesso!');
    }


    public function destroy(Editora $editora)
    {
        $editora->delete();

        return redirect()->route('editoras.index')->with('success', 'Editora excluída com sucesso!');
    }
}
